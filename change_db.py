import json

values = []
music_fields = ['music_id', 'name', 'src', 'story', 'download_cnt', 'share_cnt', 'collect_cnt', 'view_cnt', 'randable', 'musician_id', 'lyrics_by', 'lyrics_src', 'composed_by', 'arranged_by']
inserts1 = []
inserts2 = []

def trim_quote(t):
    t = t.strip()
    if t[0] == '\'':
        t = t[1:-1]
    return t

def read_insert(filename):
    with open(filename, 'r') as f:
        for line in f:
            if line[0] == '(':
                #tmp = line.decode('utf-8')
                tmp = line.rstrip()
                tmp = tmp[1:-2] # trim (, ), ;
                fmt_line = tmp.split(', ')
                fmt_line = [trim_quote(t) for t in fmt_line]
                values.append(fmt_line)


def change_column():
    i = 0
    for l in values:
        i = i + 1
        inserts1.append([l[0], l[1], l[2], l[3], 0, 0, 0, 0, l[8], l[9], l[12], l[13], l[14], l[15]])  

def to_str(arr, quote):
    ret = []
    for t in arr:
        t = str(t)
        t = quote + t + quote 
        ret.append(t)
    return ret

def output(table_name, filename, fields, arr):
    with open(filename, 'w') as f:
        header = 'INSERT INTO `' + table_name + '` (' + ', '.join(to_str(fields, '`')) + ') VALUES\n'

        vs = [];
        for l in arr:
            vs.append(header + '(' + ', '.join(to_str(l, '"')) + ')' + ';')
        f.write('\n'.join(vs))

read_insert("music.sql")
change_column()
output("music", "new_music.sql", music_fields, inserts1)

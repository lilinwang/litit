values = []
user_fields = ['user_id', 'user_type', 'email', 'password', 'nickname', 'gender', 'birthday', 'avatar_src', 'reg_time', 'introduction']
musician_fields = ['musician_id', 'user_id', 'real_name', 'follower_cnt']
music_fields = ['']
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
                fmt_line = tmp.split(',')
                fmt_line = [trim_quote(t) for t in fmt_line]
                values.append(fmt_line)


def change_column():
    i = 0
    for l in values:
        i = i + 1
        inserts1.append([i, 1, l[1], l[2], l[3], l[5], l[6], l[10], l[13], l[8]])  
        inserts2.append([l[0], i, l[4], 0])

def to_str(arr, quote):
    ret = []
    for t in arr:
        t = str(t)
        t = quote + t + quote 
        ret.append(t)
    return ret

def output(table_name, filename, fields, arr):
    with open(filename, 'w') as f:
        f.write('INSERT INTO `' + table_name + '` (')
        f.write(', '.join(to_str(fields, '`')))
        f.write(') VALUES\n')

        vs = [];
        for l in arr:
            vs.append('(' + ', '.join(to_str(l, '"')) + ')')
        f.write(',\n'.join(vs))

read_insert("musician.sql")
change_column()
output("user", "new_user.sql", user_fields, inserts1)
output("musician", "new_musician.sql", musician_fields, inserts2)

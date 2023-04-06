def scope():
    loc = "init"
    def do_local():
        loc = "local"
    def do_nonlocal():
        nonlocal loc 
        loc = "nonlocal"
    def do_global():
        global loc 
        print(loc)
        loc = "global"

    do_local()
    print("A:", loc)
    do_nonlocal() 
    print("B:", loc)
    do_global()
    print("C:", loc)

scope()
print("D:", loc)


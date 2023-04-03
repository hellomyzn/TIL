# 関数
# pra13_1
def div2(value):
    ''' 引数の値の1/2を表示する'''
    value /= 2
    print(value)

div2(10)
div2(3.5)
print(div2.__doc__)

# pra13_2
def div2r(value):
    '''引数の値の1/2を戻す'''
    value /= 2
    return value

ix = 10
print(div2r(ix))
print(ix)
print(div2r.__doc__)


# pra13_3
def div2a(value):
    ''' 引数のリスト値を1/2にする '''
    for idx in range(len(value)):
        value[idx] /= 2

ary = [10, 3.5]
print(ary)
div2a(ary)
print(ary)

# q13
def ceasar_cipher(mes: str, shift: int) -> str:
    shift_mes = ""
    for ch in mes:
        unicode = ord(ch)
        shifted_code = int(unicode) + 1
        encrypted_ch = chr(shifted_code)
        shift_mes += encrypted_ch

    return shift_mes

mes = 'HAL'
cipher_mes = ceasar_cipher(mes, 1)
print(cipher_mes)

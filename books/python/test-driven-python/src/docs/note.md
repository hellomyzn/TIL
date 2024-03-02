# note



## 辞書に**を付けて展開（アンパック）
辞書dictに**を付けて引数に指定すると、要素のキーkeyが引数名、値valueが引数の値として展開されて、それぞれ個別の引数として渡される。

```python
def func(arg1, arg2, arg3):
    print('arg1 =', arg1)
    print('arg2 =', arg2)
    print('arg3 =', arg3)

d = {'arg1': 'one', 'arg2': 'two', 'arg3': 'three'}

func(**d)
# arg1 = one
# arg2 = two
# arg3 = three

func(**{'arg1': 'one', 'arg2': 'two', 'arg3': 'three'})
# arg1 = one
# arg2 = two
# arg3 = three
```

## dataclasses.asdict() 
`dataclasses.asdict()` は dataclass を渡すとそれを dict に変換して返してくれる関数です。
```python
@dataclass
class Card:
    summary: str = None
    owner: str = None
    state: str = "todo"
    id: int = field(default=None, compare=False)

    @classmethod
    def from_dict(cls, d):
        return Card(**d)

    def to_dict(self):
        return asdict(self)

arg = {"summary": "1", "owner": "11", "state": "111", "id": "1111"}
piyo = Card.from_dict(arg) 
>>> {'summary': '1', 'owner': '11', 'state': '111', 'id': '1111'}
```

## dataclasses.field
`dataclasses.field`の`compare=False`はデータの比較を無視する

```python
@dataclass
class Card:
    summary: str = None
    owner: str = None
    state: str = "todo"
    id: int = field(default=None, compare=False)

    c1 = Card("something", "brian", "todo", 123)
    c2 = Card("something", "brian", "todo", 4567)
    assert c1 == c2
```

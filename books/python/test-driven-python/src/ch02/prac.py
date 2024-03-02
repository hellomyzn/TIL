"""
API for the cards project
"""
from dataclasses import asdict
from dataclasses import dataclass
from dataclasses import field

__all__ = [
    "Card",
    "CardsDB",
    "CardsException",
    "MissingSummary",
    "InvalidCardId",
]


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


arg1 = {"summary": "1", "owner": "11", "state": "111", "id": "1111"}
arg2 = ("2", "22", "222", "2222")
hoge = Card(arg1)
fuga = Card("2", "22", "222", "2222")
piyo = hoge.from_dict(arg1)
print(hoge.to_dict())
print(fuga.to_dict())
print(piyo.to_dict())

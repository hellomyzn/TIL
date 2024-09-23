def test_add_some(cards_db, some_cards):
    expected_cont = len(some_cards)
    for c in some_cards:
        cards_db.add_card(c)
    assert cards_db.count() == expected_cont


def test_non_empty(non_empty_db):
    assert non_empty_db.count() > 0


def test_non_empty2(non_empty_db):
    assert not non_empty_db.count() == 0

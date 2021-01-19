from hamcrest import assert_that, calling, equal_to, raises
from example.example import do_nothing

def test_binary_search_raises_type_error_on_uncomparable_collection():
    assert_that(calling(do_nothing).with_args(1, 2), raises(TypeError))

def test_binary_search_returns_negative_if_item_not_present():
    assert_that(do_nothing('example'), equal_to(1))

def test_binary_search_returns_negative_if_item_not_present():
    assert_that(do_nothing('example'), equal_to(42))

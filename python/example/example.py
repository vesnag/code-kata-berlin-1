from typing import Dict, List


def do_nothing(input: Dict[int, List[str]]) -> int:
    if not input:
        raise ValueError()
    return 42

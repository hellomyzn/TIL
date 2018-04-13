import unittest

import calculationPython


class CalTest(unittest.TestCase):
    def test_add_num_and_double(self):
        cal = calculationPython.Call()
        self.assertEqual(cal.add_num_add_double(1, 1), 4)


if __name__ == '__main__':
    unittest.main()

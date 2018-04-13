import unittest

import calculationPython


class CalTest(unittest.TestCase):

    def setUp(self):
        print('setup')
        self.cal = calculationPython.Call()

    def tearDown(self):
        print('clean up')
        del self.cal

    def test_add_num_and_double(self):
        self.assertEqual(self.cal.add_num_add_double(1, 1), 4)

    def test_add_num_and_double_raise(self):
        with self.assertRaises(ValueError):
            self.cal.add_num_add_double('1', '1')




if __name__ == '__main__':
    unittest.main()

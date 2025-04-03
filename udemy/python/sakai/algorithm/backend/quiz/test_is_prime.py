import unittest

from is_prime import is_prime_v4 as is_prime

class PrimeTest(unittest.TestCase):
    
    # def __init__(self):
    #     self.prime_numbers_list = [2,3,5,7,11,13,17,19]
    #     self.non_prime_numbers_list = [1,4,6,8,9,10,12,14,15,16,18,20]

    def test_is_prime_ok(self):
        prime_numbers_list = [2,3,5,7,11,13,17,19]
        for i in prime_numbers_list:
            self.assertTrue(is_prime(i))
        
    def test_is_prime_no(self):
        non_prime_numbers_list = [1,4,6,8,9,10,12,14,15,16,18,20]
        for i in non_prime_numbers_list:
            self.assertFalse(is_prime(i))

    def test_is_prime_negative(self):
        self.assertFalse(is_prime(-1))

    def test_is_prime_raise_typeerror(self):
        with self.assertRaises(TypeError):
            is_prime('test')

if __name__ == '__main__':
    unittest.main()
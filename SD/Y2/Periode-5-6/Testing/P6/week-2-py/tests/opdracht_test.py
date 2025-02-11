import unittest

from src.opdracht import find_max_value

class testCalculateAverage(unittest.TestCase):
    def test_find_max_value(self): # dit test de max value met de getallen 1 tot en met 5
        # Arrange
        lst = [1, 2, 3, 4, 5]
        # Act
        result = find_max_value(lst)
        # Assert
        self.assertEqual(result, 5)

    def test_find_max_value_sameNumber(self): # dit test de max value met even getallen
        #arrange 
        lst = [5, 5, 5, 5, 5]
        #act
        result = find_max_value(lst)
        #assert
        self.assertEqual(result, 5)
  

    def test_find_list_of_values(self): # dit test de max value maar dan met decimal getallen
        #arrange
        lst = [10.01, 20.99, 30.35, 40.90, 50,65, 60.6, 70000000.433, 90000000.5550000]
        #act
        result = find_max_value(lst)
        #assert
        self.assertEqual(result, 90000000.5550000)


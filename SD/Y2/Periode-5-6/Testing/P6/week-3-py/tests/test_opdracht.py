import unittest
from src.opdracht import Winkelwagen
from parameterized import parameterized
class TestWinkelwagen(unittest.TestCase):

    def items_fixture():
        return [
            ({"melk": 1, "eieren": 1}, 55.80),
            ({"appels": 2, "brood": 3}, 59.40),
            ({"eieren": 2, "appels": 3, "melk": 2}, 71.90),
        ]

    def test_totale_prijs(self):
        # Arrange
        winkelwagen = Winkelwagen()
        # Act
        result = winkelwagen.totale_prijs()  
        # Assert
        self.assertEqual(round(result, 2), 48.10) 


    @parameterized.expand(items_fixture)
    def test_add_toevoegen(self, items, expected_prijs):
        # Arrange
        winkelwagen = Winkelwagen()
        # Act
        result = winkelwagen.totale_prijs()
        # Assert
        self.assertEqual(round(result, 2), expected_prijs)
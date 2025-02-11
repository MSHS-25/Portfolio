import unittest
from parameterized import parameterized
from test.opdracht import authenticeer_gebruiker

class TestAuthenticeerGebruiker(unittest.TestCase):

    def gebruikers_fixture():
        return [
            ("admin_vdb", "AdminWachtwoord", False),  
            ("motje_vdb", "TurkijeNummerEen", True),
            ("piet_69", "sixnine", True),
            ("abdel_020", "wachtwoord123", True),
            ("piet_69", "wrongpassword", False)
        ]

    @parameterized.expand(gebruikers_fixture)
    def test_gebruikersnaam_wachtwoord(self, gebruikersnaam, wachtwoord, test_value):
        # Act
        result = authenticeer_gebruiker(gebruikersnaam, wachtwoord)

        # Assert
        self.assertEqual(result, test_value)

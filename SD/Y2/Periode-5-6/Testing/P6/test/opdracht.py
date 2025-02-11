def authenticeer_gebruiker(gebruikersnaam, wachtwoord):
    gebruikers = {
        "admin_vdb": "Adminwachtwoord",
        "abdel_020": "wachtwoord123",
        "piet_69": "sixnine",
        "motje_vdb": "TurkijeNummerEen"
        
    }
    return gebruikers.get(gebruikersnaam) == wachtwoord

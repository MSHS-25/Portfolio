import 'package:flutter/material.dart';

void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Gemeente App',
      theme: ThemeData(
        primarySwatch: Colors.red,
      ),
      home: LandingPage(),
    );
  }
}

class LandingPage extends StatefulWidget {
  @override
  _LandingPageState createState() => _LandingPageState();
}

class _LandingPageState extends State<LandingPage> {
  int _selectedIndex = 0; // Track selected page for BottomNavigationBar
  int likeCount = 0; // Initial count

  void incrementLikes() {
    setState(() {
      likeCount++;
    });
  }

  void navigateTo(int index) {
    setState(() {
      _selectedIndex = index;
    });
  }

  // Define pages after initialization
  List<Widget> get _pages {
    return [
      // LandingPage
      Center(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: [
            FullImage('assets/images/istockphoto-1021079016-612x612.jpg',
                height: 250), // Gebruik FullImage
            SizedBox(height: 20),
            FullImage('assets/images/construction-site-plan.jpg',
                height: 200), // Gebruik FullImage
            SizedBox(height: 20),
            Text(
              '$likeCount Likes',
              style: TextStyle(fontSize: 20, fontWeight: FontWeight.bold),
            ),
          ],
        ),
      ),
      // MapScreen
      Center(
        child: FullImage('assets/images/Screenshot 2025-01-14 170114.png',
            height: 600), // Map image displayed
      ),
    ];
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Werkzaamheden'),
        centerTitle: true,
        backgroundColor: Colors.red, // Bovenste gedeelte rood maken
      ),
      body: _pages[_selectedIndex], // Display selected page
      bottomNavigationBar: BottomAppBar(
        color: Colors.red, // Onderste gedeelte rood maken
        child: BottomNavigationBar(
          backgroundColor: Colors.red,
          currentIndex: _selectedIndex, // Track current selected index
          items: [
            BottomNavigationBarItem(
              icon: Icon(Icons.home,
                  color: Colors.white, size: 20), // Icon size reduced
              label: 'Home',
            ),
            BottomNavigationBarItem(
              icon: Icon(Icons.map,
                  color: Colors.white, size: 20), // Icon size reduced
              label: 'Kaart',
            ),
          ],
          selectedItemColor: Colors.white,
          unselectedItemColor: Colors.white,
          onTap: navigateTo,
        ),
      ),
      floatingActionButton: _selectedIndex == 0
          ? FloatingActionButton(
              onPressed: incrementLikes, // Increment likes when pressed
              child: Icon(Icons.thumb_up),
              backgroundColor: Colors.red, // Set the color of the FAB to red
            )
          : null,
    );
  }
}

class FullImage extends StatelessWidget {
  final String assetPath;
  final double height;
  const FullImage(this.assetPath, {this.height = 200, Key? key})
      : super(key: key);

  @override
  Widget build(BuildContext context) {
    return Image.asset(
      assetPath,
      fit: BoxFit
          .contain, // Zorg ervoor dat de afbeelding volledig wordt weergegeven
      height: height,
    );
  }
}

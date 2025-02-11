import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter BasicApp',
      theme: ThemeData(
        useMaterial3: true,
        colorSchemeSeed: Colors.blue,
      ),
      home: const MyHomePage(title: 'NextApp'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({super.key, required this.title});
  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  int currentScreenIndex = 0;

  final screens = [
    Column(
      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
      children: <Widget>[
        Container(
          child: ClipImage("assets/images/sharedimage.jpeg"),
        ),
        const Text(
          'Mijn NextApp',
          style: TextStyle(fontSize: 30),
        ),
      ],
    ),
    Column(
      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
      children: <Widget>[
        ClipImage("assets/images/1_5-aoK8IBmXve5whBQM90GA.png"),
        const Text(
          'Ik leer Flutter',
          style: TextStyle(fontSize: 30),
        ),
      ],
    ),
    Column(
      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
      children: <Widget>[
        ClipImage("assets/images/Dart-logo.png"),
        const Text(
          'Explore Dart and Flutter',
          style: TextStyle(fontSize: 30),
        ),
      ],
    ),
    Column(
      mainAxisAlignment: MainAxisAlignment.spaceEvenly,
      children: <Widget>[
        ClipImage("assets/images/touchicon-180.png"),
        const Text(
          'Firebase',
          style: TextStyle(fontSize: 30),
        ),
      ],
    ),
  ];

  @override
  Widget build(BuildContext context) {
    final isWideScreen = MediaQuery.of(context).size.width >= 640;
    final isLandscape = MediaQuery.of(context).orientation == Orientation.landscape;

    return Scaffold(
      appBar: AppBar(
        backgroundColor: const Color.fromARGB(255, 199, 225, 246),
        title: Text(widget.title),
        leading: const IconButton(
          icon: Icon(Icons.menu),
          tooltip: 'Navigation menu',
          onPressed: null,
        ),
      ),
      body: Row(
        children: [
          if (isWideScreen || isLandscape)
            NavigationRail(
              selectedIndex: currentScreenIndex,
              onDestinationSelected: (int index) {
                setState(() {
                  currentScreenIndex = index;
                });
              },
              destinations: const [
                NavigationRailDestination(
                  icon: Icon(Icons.home),
                  label: Text('Home'),
                ),
                NavigationRailDestination(
                  icon: Icon(Icons.favorite),
                  label: Text('Favorite'),
                ),
                NavigationRailDestination(
                  icon: Icon(Icons.explore),
                  label: Text('Explore'),
                ),
                NavigationRailDestination(
                  icon: Icon(Icons.search),
                  label: Text('Search'),
                ),
              ],
              labelType: NavigationRailLabelType.all,
            ),
          Expanded(
            child: screens[currentScreenIndex],
          ),
        ],
      ),
      bottomNavigationBar: (!isWideScreen && !isLandscape)
          ? NavigationBar(
              selectedIndex: currentScreenIndex,
              onDestinationSelected: (int index) {
                setState(() {
                  currentScreenIndex = index;
                });
              },
              destinations: const <NavigationDestination>[
                NavigationDestination(
                  icon: Icon(Icons.home),
                  label: 'Home',
                ),
                NavigationDestination(
                  icon: Icon(Icons.favorite),
                  label: 'Favorite',
                ),
                NavigationDestination(
                  icon: Icon(Icons.explore),
                  label: 'Explore',
                ),
                NavigationDestination(
                  icon: Icon(Icons.search),
                  label: 'Search',
                ),
              ],
            )
          : null,
    );
  }
}

class ClipImage extends StatelessWidget {
  final String _assetPath;
  const ClipImage(this._assetPath, {super.key});

  @override
  Widget build(BuildContext context) {
    return ClipOval(
      child: SizedBox.fromSize(
        size: const Size.fromRadius(144),
        child: Image.asset(
          _assetPath,
          fit: BoxFit.cover,
        ),
      ),
    );
  }
}

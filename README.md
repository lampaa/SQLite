Needed a class for working with SQLite database. Actually they keep, but I decided to make my own :) The result was quite soundly and with buns in the form of prepare.
Under the cut the class and review functions.
The database connection is done the following way:

```php
$mydb = new SQLite($file_path [, $auto=true]);
```
```$file_path``` — the path to the DB
Returns false if:

the database is already open
the path to the DB is not set
let to the database is not a file
failed to open database
$auto option, setting, to access the database immediately after creating the class (true) or open function ```SQLite::open([$mode])```;

```php
SQLite::open([$mode]);
```

```$mode``` — the optional parameter sets the mode of access rights on the file.

```php
SQLite::close();
```
Closes the database.

```php
SQLite::query($query);
```

Performs a query against the database
```$query``` — request (for example: ```SELECT * FROM table```)

```php
SQLite::fetch($type);
```

Fetches the next record from the query result and returns an array
$type — type of indexing of the returned object.
is of several types:

```SQLite::ASSOC``` — associative array
```SQLite::NUM``` — a numeric array
```SQLite::BOTH``` — numeric and associative array

```php
SQLite::fetchAll($type);
```

Selects all records from the query result and returns a multidimensional array
```$type``` — type of indexing of the returned object.
is of several types:

```SQLite::ASSOC``` — an associative array
```SQLite::NUM``` — an array of numbers
```SQLite::BOTH``` — numeric and associative array


```php
SQLite::last_insert_id();
```
Returns the ID of the last inserted record.
```php
SQLite::rows();
Returns the number of records in the query result
```

```php
SQLite::getColumns($table);
```

Returns the mass of table columns $table
```php
SQLite::getTables();
```

Returns all tables in a given database as an array.

```php
escape_string()
```

a Function to escape characters that can be used as:


```php
SQLite::escape_string($query);
```

and in the query:

```php
$query = "SELECT * FROM table WHERE text='escape_string($text)'";
SQLite::prepare($query);
```

the Binding of the parameter with the specified variable. Works in conjunction with the function:
```php
SQLite::bindParam($bind, $string[, $type]);
```

```$bind``` —
```$string``` — the text that will replace the
```$type``` — type
Types are of various kinds:

```SQLite::IS_INT``` — numeric
```SQLite::IS_STR``` — the string
regular expression — you can also substitute regular expression

```php
SQLite::execute();
```

executes the query, if the query is specified using bundles of options.

examples for each function.

Connect to database, create tables, add records, most recent ID, delete the last line and closing the connection.

```php
$mydb = new SQLite(ENGINE.'/files/history.db');
$mydb->query("CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))");
//
$mydb->query("INSERT INTO history VALUES(NULL,'name')");
//
$last_id = $mydb->last_insert_id();
echo $last_id;
//
$mydb->query("DELETE FROM history WHERE id='{$last_id}'");
//
$mydb->close();
```

the database Connection, create table, add an entry with the parameter, the output of all records, close the connection.

```php
$mydb = new SQLite(ENGINE.'/files/history.db');
$mydb->query("CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))");
//
$query = $mydb->prepare("INSERT INTO history VALUES(NULL, :name)");
$query->bindParam(':name', 'John', SQLite::IS_STR);
$query->execute();
 
$result = $mydb->query("SELECT * FROM history")->fetchAll(SQLite::ASSOC);
 
var_dump($result);
//
$mydb->close();
```

the database Connection, create table, retrieving all the tables, retrieving all columns in the table closing the connection.

```php
$mydb = new SQLite(ENGINE.'/files/history.db');
$mydb->query("DROP TABLE history");
$mydb->query("CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))");
//
 
$tables = $mydb->getTables();
$columns = $mydb->getColumns('history');
 
var_dump($tables);
var_dump($columns);
//
$mydb->close();
```

the database Connection, create table, add an entry + escaping quotes special function escape_string(), closing the connection

```php
$mydb = new SQLite(ENGINE.'/files/history.db');
$mydb->query("DROP TABLE history");
$mydb->query("CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, adress VARCHAR(128) NOT NULL, PRIMARY KEY(id))");
//
$name = 'Jogn1"';
$adress = "Street 10'1";
//
$mydb->query("INSERT INTO history VALUES(NULL, 'escape_string($name)', '".SQLite::escape_string($adress)."')");
 
var_dump($mydb->query("SELECT * FROM history")->fetchAll(ASSOC));
//
$mydb->close();
```

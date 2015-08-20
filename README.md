<div class="entry-content" style='background: #333;color:#DDDDDD'>
						<p>Needed a class for working with <strong>SQLite database</strong>. Actually they keep, but I decided to make my own <img class="wp-smiley" alt=":)" src="http://lampacore.ru/wp-includes/images/smilies/icon_smile.gif">  The result was quite soundly and with buns in the form of <strong>prepare</strong>.<br>
Under the cut the class and review functions.<br>
<span id="more-217"></span></p>
<hr>
<p>The database connection is done the following way:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color: #000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color: #009900;">(</span><span style="color: #000088;">$file_path</span> <span style="color: #009900;">[</span><span style="color: #339933;">,</span> <span style="color: #000088;">$auto</span><span style="color: #339933;">=</span><span style="color: #009900; font-weight: bold;">true</span><span style="color: #009900;">]</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p><strong style="color: aqua">$file_path</strong> &mdash; the path to the DB<br>
Returns <strong style="color: aqua">false</strong> if:</p>
<ul>
<li>the database is already open</li>
<li>the path to the DB is not set</li>
<li>let to the database is not a file</li>
<li>failed to open database</li>
</ul>
<p><strong style="color: aqua">$auto</strong> option, setting, to access the database immediately after creating the class (true) or open function <strong style="color: aqua">SQLite::open([$mode]);</strong></p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">open</span><span style="color: #009900;">(</span><span style="color: #009900;">[</span><span style="color: #000088;">$mode</span><span style="color: #009900;">]</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p><strong style="color: aqua">$mode</strong> &mdash; the optional parameter sets the mode of access rights on the file.</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">close</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Closes the database.</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #000088;">$query</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Performs a query against the database<br>
<strong style="color: aqua">$query</strong> &mdash; request (for example: SELECT * FROM table)</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">fetch</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Fetches the next record from the query result and returns an array<br>
<strong style="color: aqua">$type</strong> &mdash; type of indexing of the returned object.<br>
is of several types:</p>
<ul>
<li><strong>SQLite::ASSOC</strong> &mdash; associative array</li>
<li><strong>SQLite::NUM</strong> &mdash; a numeric array</li>
<li><strong>SQLite::BOTH</strong> &mdash; numeric and associative array</li>
</ul>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">fetchAll</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Selects all records from the query result and returns a multidimensional array<br>
<strong style="color: aqua">$type</strong> &mdash; type of indexing of the returned object.<br>
is of several types:</p>
<ul>
<li><strong>SQLite::ASSOC</strong> &mdash; an associative array</li>
<li><strong>SQLite::NUM</strong> &mdash; an array of numbers</li>
<li><strong>SQLite::BOTH</strong> &mdash; numeric and associative array</li>
</ul>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color:#004000;">last_insert_id</span><span style="color:#009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>Returns the ID of the last inserted record.</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color:#004000;">rows</span><span style="color:#009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>Returns the number of records in the query result</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color:#004000;">getColumns</span><span style="color:#009900;">(</span><span style="color:#000088;">$table</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>Returns the mass of table columns <strong style="color: aqua">$table</strong></p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color:#004000;">getTables</span><span style="color:#009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>Returns all tables in a given database as an array.</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">escape_string<span style="color:#009900;">(</span><span style="color:#009900;">)</span></pre></td></tr></tbody></table></div>

<p>a Function to escape characters that can be used as:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color:#004000;">escape_string</span><span style="color:#009900;">(</span><span style="color:#000088;">$query</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>and in the query:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color:#000088;">$query</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">"SELECT * FROM table WHERE text='escape_string(<span style="color: #006699; font-weight: bold;">$text</span>)'"</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color:#004000;">prepare</span><span style="color:#009900;">(</span><span style="color:#000088;">$query</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>the Binding of the parameter with the specified variable. Works in conjunction with the function:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color:#004000;">bindParam</span><span style="color:#009900;">(</span><span style="color:#000088;">$bind</span><span style="color: #339933;">,</span> <span style="color:#000088;">$string</span><span style="color:#009900;">[</span><span style="color: #339933;">,</span> <span style="color:#000088;">$type</span><span style="color:#009900;">]</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p><strong style="color: aqua">$bind</strong> &mdash;<br>
<strong style="color: aqua">$string</strong> &mdash; the text that will replace the<br>
<strong style="color: aqua">$type</strong> &mdash; type<br>
Types are of various kinds:</p>
<ul>
<li><strong>SQLite::IS_INT</strong> &mdash; numeric</li>
<li><strong>SQLite::IS_STR</strong> &mdash; the string</li>
<li><strong>regular expression</strong> &mdash; you can also substitute regular expression</li>
</ul>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color:#004000;">execute</span><span style="color:#009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>executes the query, if the query is specified using bundles of options.</p>
<hr>
<p>examples for each function.</p>
<p>Connect to database, create tables, add records, most recent ID, delete the last line and closing the connection.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color:#000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color:#009900;">(</span>ENGINE<span style="color:#339933;">.</span><span style="color:#0000ff;">'/files/history.db'</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))"</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"INSERT INTO history VALUES(NULL,'name')"</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$last_id</span> <span style="color: #339933;">=</span> <span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">last_insert_id</span><span style="color:#009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #b1b100;">echo</span> <span style="color:#000088;">$last_id</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"DELETE FROM history WHERE id='<span style="color: #006699; font-weight: bold;">{$last_id}</span>'"</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">close</span><span style="color: #009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>the database Connection, create table, add an entry with the parameter, the output of all records, close the connection.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color:#000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color:#009900;">(</span>ENGINE<span style="color:#339933;">.</span><span style="color:#0000ff;">'/files/history.db'</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))"</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$query</span> <span style="color: #339933;">=</span> <span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">prepare</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"INSERT INTO history VALUES(NULL, :name)"</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$query</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">bindParam</span><span style="color:#009900;">(</span><span style="color:#0000ff;">':name'</span><span style="color: #339933;">,</span> <span style="color:#0000ff;">'John'</span><span style="color: #339933;">,</span> SQLite<span style="color: #339933;">::</span><span style="color:#004000;">IS_STR</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$query</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">execute</span><span style="color:#009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
&nbsp;
<span style="color:#000088;">$result</span> <span style="color: #339933;">=</span> <span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"SELECT * FROM history"</span><span style="color:#009900;">)</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">fetchAll</span><span style="color:#009900;">(</span>SQLite<span style="color: #339933;">::</span><span style="color:#004000;">ASSOC</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
&nbsp;
<span style="color:#990000;">var_dump</span><span style="color:#009900;">(</span><span style="color:#000088;">$result</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">close</span><span style="color:#009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>the database Connection, create table, retrieving all the tables, retrieving all columns in the table closing the connection.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color:#000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color:#009900;">(</span>ENGINE<span style="color:#339933;">.</span><span style="color:#0000ff;">'/files/history.db'</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"DROP TABLE history"</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))"</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
&nbsp;
<span style="color:#000088;">$tables</span> <span style="color: #339933;">=</span> <span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">getTables</span><span style="color:#009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$columns</span> <span style="color: #339933;">=</span> <span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">getColumns</span><span style="color:#009900;">(</span><span style="color:#0000ff;">'history'</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
&nbsp;
<span style="color:#990000;">var_dump</span><span style="color:#009900;">(</span><span style="color:#000088;">$tables</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#990000;">var_dump</span><span style="color:#009900;">(</span><span style="color:#000088;">$columns</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">close</span><span style="color:#009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

<p>the database Connection, create table, add an entry + escaping quotes special function escape_string(), closing the connection</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color:#000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color:#009900;">(</span>ENGINE<span style="color:#339933;">.</span><span style="color:#0000ff;">'/files/history.db'</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"DROP TABLE history"</span><span style="color: #009900;">)</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, adress VARCHAR(128) NOT NULL, PRIMARY KEY(id))"</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$name</span> <span style="color: #339933;">=</span> <span style="color:#0000ff;">'Jogn1"'</span><span style="color:#339933;">;</span>
<span style="color:#000088;">$adress</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">"Street 10'1"</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"INSERT INTO history VALUES(NULL, 'escape_string(<span style="color: #006699; font-weight: bold;">$name</span>)', '"</span><span style="color: #339933;">.</span>SQLite<span style="color: #339933;">::</span><span style="color:#004000;">escape_string</span><span style="color:#009900;">(</span><span style="color:#000088;">$adress</span><span style="color:#009900;">)</span><span style="color:#339933;">.</span><span style="color:#0000ff;">"')"</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
&nbsp;
<span style="color:#990000;">var_dump</span><span style="color:#009900;">(</span><span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">query</span><span style="color:#009900;">(</span><span style="color: #0000ff;">"SELECT * FROM history"</span><span style="color:#009900;">)</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">fetchAll</span><span style="color:#009900;">(</span>ASSOC<span style="color:#009900;">)</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color:#000088;">$mydb</span><span style="color:#339933;">-&gt;</span><span style="color:#004000;">close</span><span style="color: #009900;">(</span><span style="color:#009900;">)</span><span style="color:#339933;">;</span></pre></td></tr></tbody></table></div>

</div>

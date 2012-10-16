<style>
.php {
    color: #110000;
	background-color: #F9F9F9;
    border: 1px solid silver;
}
</style>
<div class="entry-content" style='background: #333;color:#DDDDDD'>
						<p>Нужен был класс для работы с <strong>SQLite базой данных</strong>. Собственно в сети их дофига, но я решил сделать свой <img class="wp-smiley" alt=":)" src="http://lampacore.ru/wp-includes/images/smilies/icon_smile.gif">  В итоге получилось довольно-таки добротно и с плюшками в виде <strong>prepare</strong>.<br>
Под катом сам класс и рассмотр функций.<br>
<span id="more-217"></span></p>
<hr>
<p>Подключение к базе данных происходит следующим способом:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color: #000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color: #009900;">(</span><span style="color: #000088;">$file_path</span> <span style="color: #009900;">[</span><span style="color: #339933;">,</span> <span style="color: #000088;">$auto</span><span style="color: #339933;">=</span><span style="color: #009900; font-weight: bold;">true</span><span style="color: #009900;">]</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p><strong style="color: aqua">$file_path</strong> &mdash; путь до БД<br>
Возвращает <strong style="color: aqua">false</strong> если:</p>
<ul>
<li>база уже открыта</li>
<li>путь до БД не задан</li>
<li>пусть до БД это не файл</li>
<li>не удалось открыть базу данных</li>
</ul>
<p><strong style="color: aqua">$auto</strong> опция, устаналивающая, открывать БД сразу после создания класса (true), или открывать функцией <strong style="color: aqua">SQLite::open([$mode]);</strong></p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">open</span><span style="color: #009900;">(</span><span style="color: #009900;">[</span><span style="color: #000088;">$mode</span><span style="color: #009900;">]</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p><strong style="color: aqua">$mode</strong> &mdash; не обязательный параметр, устанавливает режим прав доступа на файл.</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">close</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Закрывает базу данных.</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #000088;">$query</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Выполняет запрос к базе данных<br>
<strong style="color: aqua">$query</strong> &mdash; запрос (например: SELECT * FROM table)</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">fetch</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Выбирает следующую запись из результата запроса и возвращает массив<br>
<strong style="color: aqua">$type</strong> &mdash; тип индексации возвращаемого объекта.<br>
бывает нескольких видов:</p>
<ul>
<li><strong>SQLite::ASSOC</strong> &mdash; ассоциативный массив</li>
<li><strong>SQLite::NUM</strong> &mdash; числовой массив</li>
<li><strong>SQLite::BOTH</strong> &mdash; числовой и ассоциативный массив</li>
</ul>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">fetchAll</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Выбирает все записи из результата запроса и возвращает многомерный массив<br>
<strong style="color: aqua">$type</strong> &mdash; тип индексации возвращаемого объекта.<br>
бывает нескольких видов:</p>
<ul>
<li><strong>SQLite::ASSOC</strong> &mdash; ассоциативный массив</li>
<li><strong>SQLite::NUM</strong> &mdash; числовой массив</li>
<li><strong>SQLite::BOTH</strong> &mdash; числовой и ассоциативный массив</li>
</ul>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">last_insert_id</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Возвращает идентификатор последней вставленной записи</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">rows</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Возвращает количество записей в результате запроса</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">getColumns</span><span style="color: #009900;">(</span><span style="color: #000088;">$table</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Возвращает массов столбцов таблицы <strong style="color: aqua">$table</strong></p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">getTables</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Возвращает все таблицы данной базы данных в виде массива.</p>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">escape_string<span style="color: #009900;">(</span><span style="color: #009900;">)</span></pre></td></tr></tbody></table></div>

<p>Функция для экранирования символов, которая может быть применена как:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">escape_string</span><span style="color: #009900;">(</span><span style="color: #000088;">$query</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Так и в самом запросе:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color: #000088;">$query</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">"SELECT * FROM table WHERE text='escape_string(<span style="color: #006699; font-weight: bold;">$text</span>)'"</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">prepare</span><span style="color: #009900;">(</span><span style="color: #000088;">$query</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Связывание параметра с указанной переменной. Работает в связке с функцией:</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">bindParam</span><span style="color: #009900;">(</span><span style="color: #000088;">$bind</span><span style="color: #339933;">,</span> <span style="color: #000088;">$string</span><span style="color: #009900;">[</span><span style="color: #339933;">,</span> <span style="color: #000088;">$type</span><span style="color: #009900;">]</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p><strong style="color: aqua">$bind</strong> &mdash; параметр<br>
<strong style="color: aqua">$string</strong> &mdash; текст, который будет заменять параметр<br>
<strong style="color: aqua">$type</strong> &mdash; тип<br>
Типы бывают разных видов:</p>
<ul>
<li><strong>SQLite::IS_INT</strong> &mdash; числовой</li>
<li><strong>SQLite::IS_STR</strong> &mdash; строковый</li>
<li><strong>регулярное выражение</strong> &mdash; можно подставить также регулярное выражение</li>
</ul>
<hr>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php">SQLite<span style="color: #339933;">::</span><span style="color: #004000;">execute</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Служит для выполнения запроса, если запрос задан через связки параметров.</p>
<hr>
<p>Также примеры по каждой функции.</p>
<p>Подключение к базе данных, создание таблицы, добавление записи, вывод последнего идентификатора, удаление последней строки и закрытие соединения.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color: #000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color: #009900;">(</span>ENGINE<span style="color: #339933;">.</span><span style="color: #0000ff;">'/files/history.db'</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"INSERT INTO history VALUES(NULL, 'name')"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$last_id</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">last_insert_id</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #b1b100;">echo</span> <span style="color: #000088;">$last_id</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"DELETE FROM history WHERE id='<span style="color: #006699; font-weight: bold;">{$last_id}</span>'"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">close</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Подключение к базе данных, создание таблицы, добавление записи с параметром, вывод всех записей, закрытие соединения.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color: #000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color: #009900;">(</span>ENGINE<span style="color: #339933;">.</span><span style="color: #0000ff;">'/files/history.db'</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$query</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">prepare</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"INSERT INTO history VALUES(NULL, :name)"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$query</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">bindParam</span><span style="color: #009900;">(</span><span style="color: #0000ff;">':name'</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">'John'</span><span style="color: #339933;">,</span> SQLite<span style="color: #339933;">::</span><span style="color: #004000;">IS_STR</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$query</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">execute</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #000088;">$result</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"SELECT * FROM history"</span><span style="color: #009900;">)</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">fetchAll</span><span style="color: #009900;">(</span>SQLite<span style="color: #339933;">::</span><span style="color: #004000;">ASSOC</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #990000;">var_dump</span><span style="color: #009900;">(</span><span style="color: #000088;">$result</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">close</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Подключение к базе данных, создание таблицы, получение всех таблиц, получение всех столбцов в таблице, закрытие соединения.</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color: #000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color: #009900;">(</span>ENGINE<span style="color: #339933;">.</span><span style="color: #0000ff;">'/files/history.db'</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"DROP TABLE history"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, PRIMARY KEY(id))"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
&nbsp;
<span style="color: #000088;">$tables</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">getTables</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$columns</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">getColumns</span><span style="color: #009900;">(</span><span style="color: #0000ff;">'history'</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #990000;">var_dump</span><span style="color: #009900;">(</span><span style="color: #000088;">$tables</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #990000;">var_dump</span><span style="color: #009900;">(</span><span style="color: #000088;">$columns</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">close</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<p>Подключение к базе данных, создание таблицы, добавление записи + экранирование кавычек специальной функцией escape_string(), закрытие соединения</p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color: #000088;">$mydb</span> <span style="color: #339933;">=</span> <span style="color: #000000; font-weight: bold;">new</span> SQLite<span style="color: #009900;">(</span>ENGINE<span style="color: #339933;">.</span><span style="color: #0000ff;">'/files/history.db'</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"DROP TABLE history"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"CREATE TABLE history(id INTEGER AUTOINCREMENT, name VARCHAR(128) NOT NULL, adress VARCHAR(128) NOT NULL, PRIMARY KEY(id))"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$name</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'Jogn1"'</span><span style="color: #339933;">;</span>
<span style="color: #000088;">$adress</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">"Street 10'1"</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"INSERT INTO history VALUES(NULL, 'escape_string(<span style="color: #006699; font-weight: bold;">$name</span>)', '"</span><span style="color: #339933;">.</span>SQLite<span style="color: #339933;">::</span><span style="color: #004000;">escape_string</span><span style="color: #009900;">(</span><span style="color: #000088;">$adress</span><span style="color: #009900;">)</span><span style="color: #339933;">.</span><span style="color: #0000ff;">"')"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
&nbsp;
<span style="color: #990000;">var_dump</span><span style="color: #009900;">(</span><span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"SELECT * FROM history"</span><span style="color: #009900;">)</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">fetchAll</span><span style="color: #009900;">(</span>ASSOC<span style="color: #009900;">)</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
<span style="color: #666666; font-style: italic;">//</span>
<span style="color: #000088;">$mydb</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">close</span><span style="color: #009900;">(</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span></pre></td></tr></tbody></table></div>

<hr>
<p>Сам класс </p><div class="wpdm_file wpdm-only-button" id="wpdm_file_3"><div class="cont"><div class="btn_outer"><div class="btn_outer_c"><a href="http://lampacore.ru/?wpdmact=process&amp;did=My5ob3RsaW5r" title="Enter title here" rel="3" class="btn_left  ">Download</a><span class="btn_right">&nbsp;</span></div></div><div class="clear"></div></div></div><p></p>

<div class="wp_syntax"><table><tbody><tr><td class="code"><pre style="font-family:monospace;" class="php"><span style="color: #000000; font-weight: bold;">&lt;?php</span>
<span style="color: #666666; font-style: italic;">/*
	http://lampacore.ru/2012/06/10/sqliteclass/
*/</span>
<span style="color: #000000; font-weight: bold;">class</span> SQLite <span style="color: #009900;">{</span>
	<span style="color: #000000; font-weight: bold;">public</span> <span style="color: #000088;">$file</span><span style="color: #339933;">;</span>
	<span style="color: #000000; font-weight: bold;">public</span> <span style="color: #000088;">$db</span><span style="color: #339933;">;</span>
	<span style="color: #000000; font-weight: bold;">public</span> <span style="color: #000088;">$query</span><span style="color: #339933;">;</span>
	<span style="color: #000000; font-weight: bold;">public</span> <span style="color: #000088;">$prepare</span><span style="color: #339933;">;</span>
	<span style="color: #666666; font-style: italic;">//</span>
	<span style="color: #000000; font-weight: bold;">const</span> <span style="color: #990000;">IS_INT</span> <span style="color: #339933;">=</span> <span style="color: #cc66cc;">1</span><span style="color: #339933;">;</span>
	<span style="color: #000000; font-weight: bold;">const</span> IS_STR <span style="color: #339933;">=</span> <span style="color: #cc66cc;">2</span><span style="color: #339933;">;</span>
	<span style="color: #000000; font-weight: bold;">const</span> ASSOC <span style="color: #339933;">=</span> <span style="color: #cc66cc;">1</span><span style="color: #339933;">;</span>
	<span style="color: #000000; font-weight: bold;">const</span> NUM <span style="color: #339933;">=</span> <span style="color: #cc66cc;">2</span><span style="color: #339933;">;</span>
	<span style="color: #000000; font-weight: bold;">const</span> BOTH <span style="color: #339933;">=</span> <span style="color: #cc66cc;">3</span><span style="color: #339933;">;</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> __construct<span style="color: #009900;">(</span><span style="color: #000088;">$base</span><span style="color: #339933;">,</span> <span style="color: #000088;">$mode</span> <span style="color: #339933;">=</span> <span style="color: #208080;">0666</span><span style="color: #339933;">,</span> <span style="color: #000088;">$auto</span> <span style="color: #339933;">=</span> <span style="color: #009900; font-weight: bold;">true</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db_file</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$base</span><span style="color: #339933;">;</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #b1b100;">return</span> <span style="color: #000088;">$auto</span>?<span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">open</span><span style="color: #009900;">(</span><span style="color: #000088;">$mode</span><span style="color: #009900;">)</span><span style="color: #339933;">:</span><span style="color: #009900; font-weight: bold;">true</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> open<span style="color: #009900;">(</span><span style="color: #000088;">$mode</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span><span style="color: #009900;">)</span> <span style="color: #b1b100;">return</span> <span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span><span style="color: #339933;">;</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #339933;">!</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db_file</span><span style="color: #009900;">)</span> <span style="color: #b1b100;">return</span> <span style="color: #009900; font-weight: bold;">FALSE</span><span style="color: #339933;">;</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #339933;">!</span><span style="color: #990000;">is_file</span><span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db_file</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span> <span style="color: #b1b100;">return</span> <span style="color: #009900; font-weight: bold;">FALSE</span><span style="color: #339933;">;</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span> <span style="color: #339933;">=</span> <span style="color: #990000;">sqlite_open</span> <span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db_file</span><span style="color: #339933;">,</span> <span style="color: #000088;">$mode</span><span style="color: #339933;">,</span> <span style="color: #000088;">$error</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #666666; font-style: italic;">//</span>
			<span style="color: #b1b100;">return</span> <span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">else</span><span style="color: #009900;">{</span>
			<span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">error</span><span style="color: #009900;">(</span><span style="color: #000088;">$error</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
			<span style="color: #b1b100;">return</span> <span style="color: #009900; font-weight: bold;">FALSE</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
	<span style="color: #009900;">}</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> close<span style="color: #009900;">(</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">error</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">''</span><span style="color: #339933;">;</span>
		<span style="color: #990000;">sqlite_close</span><span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
		<span style="color: #b1b100;">return</span> <span style="color: #009900; font-weight: bold;">true</span><span style="color: #339933;">;</span>
    <span style="color: #009900;">}</span>	
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> query<span style="color: #009900;">(</span><span style="color: #000088;">$query</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #000088;">$query</span> <span style="color: #339933;">=</span> <span style="color: #990000;">preg_replace</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"/escape_string\((.*?)\)/"</span><span style="color: #339933;">,</span> <span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">escape_string</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"<span style="color: #006699; font-weight: bold;">$1</span>"</span><span style="color: #009900;">)</span><span style="color: #339933;">,</span> <span style="color: #000088;">$query</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
		<span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span> <span style="color: #339933;">=</span> <span style="color: #990000;">sqlite_query</span><span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span><span style="color: #339933;">,</span> <span style="color: #000088;">$query</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
		<span style="color: #b1b100;">return</span> <span style="color: #000088;">$this</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> fetch<span style="color: #009900;">(</span><span style="color: #000088;">$type</span><span style="color: #339933;">=</span>SQLITE_BOTH<span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span> <span style="color: #339933;">==</span> <span style="color: #cc66cc;">1</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #000088;">$type</span> <span style="color: #339933;">=</span> SQLITE_ASSOC<span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">elseif</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span> <span style="color: #339933;">==</span> <span style="color: #cc66cc;">2</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #000088;">$type</span> <span style="color: #339933;">=</span> SQLITE_NUM<span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">elseif</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span> <span style="color: #339933;">==</span> <span style="color: #cc66cc;">3</span> <span style="color: #339933;">||</span> <span style="color: #000088;">$type</span> <span style="color: #339933;">!=</span> SQLITE_BOTH<span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #000088;">$type</span> <span style="color: #339933;">=</span> SQLITE_BOTH<span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #b1b100;">return</span> <span style="color: #990000;">sqlite_fetch_array</span><span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #339933;">,</span> <span style="color: #000088;">$type</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>	
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> fetchAll<span style="color: #009900;">(</span><span style="color: #000088;">$type</span><span style="color: #339933;">=</span>SQLITE_BOTH<span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span> <span style="color: #339933;">==</span> <span style="color: #cc66cc;">1</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #000088;">$type</span> <span style="color: #339933;">=</span> SQLITE_ASSOC<span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">elseif</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span> <span style="color: #339933;">==</span> <span style="color: #cc66cc;">2</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #000088;">$type</span> <span style="color: #339933;">=</span> SQLITE_NUM<span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">elseif</span><span style="color: #009900;">(</span><span style="color: #000088;">$type</span> <span style="color: #339933;">==</span> <span style="color: #cc66cc;">3</span> <span style="color: #339933;">||</span> <span style="color: #000088;">$type</span> <span style="color: #339933;">!=</span> SQLITE_BOTH<span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #000088;">$type</span> <span style="color: #339933;">=</span> SQLITE_BOTH<span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #b1b100;">return</span> <span style="color: #990000;">sqlite_fetch_all</span><span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #339933;">,</span> <span style="color: #000088;">$type</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>	
&nbsp;
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> prepare<span style="color: #009900;">(</span><span style="color: #000088;">$query</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">prepare</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$query</span><span style="color: #339933;">;</span>
		<span style="color: #b1b100;">return</span> <span style="color: #000088;">$this</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> bindParam<span style="color: #009900;">(</span><span style="color: #000088;">$bind</span><span style="color: #339933;">,</span> <span style="color: #000088;">$value</span><span style="color: #339933;">,</span> <span style="color: #000088;">$types</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">''</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #000088;">$types</span> <span style="color: #339933;">==</span> <span style="color: #cc66cc;">1</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #990000;">preg_match</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"/^\d+$/"</span><span style="color: #339933;">,</span> <span style="color: #000088;">$value</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span> <span style="color: #000088;">$to_prepare</span> <span style="color: #339933;">=</span> <span style="color: #000088;">$value</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">elseif</span><span style="color: #009900;">(</span><span style="color: #000088;">$types</span> <span style="color: #339933;">==</span> <span style="color: #cc66cc;">2</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #990000;">is_string</span><span style="color: #009900;">(</span><span style="color: #000088;">$value</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span> <span style="color: #000088;">$to_prepare</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'"'</span><span style="color: #339933;">.</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">escape_string</span><span style="color: #009900;">(</span><span style="color: #000088;">$value</span><span style="color: #009900;">)</span><span style="color: #339933;">.</span><span style="color: #0000ff;">'"'</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">elseif</span><span style="color: #009900;">(</span><span style="color: #339933;">!</span><span style="color: #990000;">empty</span><span style="color: #009900;">(</span><span style="color: #000088;">$types</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #990000;">preg_match</span><span style="color: #009900;">(</span><span style="color: #000088;">$types</span><span style="color: #339933;">,</span> <span style="color: #000088;">$value</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span> <span style="color: #0000ff;">'"'</span><span style="color: #339933;">.</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">escape_string</span><span style="color: #009900;">(</span><span style="color: #000088;">$value</span><span style="color: #009900;">)</span><span style="color: #339933;">.</span><span style="color: #0000ff;">'"'</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #990000;">empty</span><span style="color: #009900;">(</span><span style="color: #000088;">$to_prepare</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span> <span style="color: #000088;">$to_prepare</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'""'</span><span style="color: #339933;">;</span>
&nbsp;
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">prepare</span> <span style="color: #339933;">=</span> <span style="color: #990000;">str_replace</span><span style="color: #009900;">(</span><span style="color: #000088;">$bind</span><span style="color: #339933;">,</span> <span style="color: #000088;">$to_prepare</span><span style="color: #339933;">,</span> <span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">prepare</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #b1b100;">return</span> <span style="color: #000088;">$this</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> execute<span style="color: #009900;">(</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #666666; font-style: italic;">//</span>
		<span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span> <span style="color: #339933;">=</span> <span style="color: #990000;">sqlite_query</span><span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span><span style="color: #339933;">,</span> <span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">prepare</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
		<span style="color: #b1b100;">return</span> <span style="color: #000088;">$this</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> last_insert_id<span style="color: #009900;">(</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #b1b100;">return</span> <span style="color: #990000;">sqlite_last_insert_rowid</span> <span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>	
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> rows<span style="color: #009900;">(</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #b1b100;">return</span> <span style="color: #990000;">sqlite_num_rows</span><span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> getColumns<span style="color: #009900;">(</span><span style="color: #000088;">$table</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #b1b100;">return</span> <span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"PRAGMA table_info(<span style="color: #006699; font-weight: bold;">$table</span>)"</span><span style="color: #009900;">)</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">fetchAll</span><span style="color: #009900;">(</span>SQLite<span style="color: #339933;">::</span><span style="color: #004000;">ASSOC</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> getTables<span style="color: #009900;">(</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
		<span style="color: #b1b100;">return</span> <span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">query</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"SELECT name FROM sqlite_master WHERE type='table' ORDER BY name"</span><span style="color: #009900;">)</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">fetchAll</span><span style="color: #009900;">(</span>SQLite<span style="color: #339933;">::</span><span style="color: #004000;">ASSOC</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> escape_string<span style="color: #009900;">(</span><span style="color: #000088;">$string</span><span style="color: #339933;">,</span> <span style="color: #000088;">$quotestyle</span><span style="color: #339933;">=</span><span style="color: #0000ff;">'both'</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
&nbsp;
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span> <span style="color: #990000;">function_exists</span><span style="color: #009900;">(</span><span style="color: #0000ff;">'sqlite_escape_string'</span><span style="color: #009900;">)</span> <span style="color: #009900;">)</span><span style="color: #009900;">{</span>
			<span style="color: #000088;">$string</span> <span style="color: #339933;">=</span> <span style="color: #990000;">sqlite_escape_string</span><span style="color: #009900;">(</span><span style="color: #000088;">$string</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
			<span style="color: #000088;">$string</span> <span style="color: #339933;">=</span> <span style="color: #990000;">str_replace</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"''"</span><span style="color: #339933;">,</span><span style="color: #0000ff;">"'"</span><span style="color: #339933;">,</span><span style="color: #000088;">$string</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span> <span style="color: #666666; font-style: italic;">#- no quote escaped so will work like with no sqlite_escape_string available
</span>		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">else</span><span style="color: #009900;">{</span>
			<span style="color: #000088;">$escapes</span> <span style="color: #339933;">=</span> <span style="color: #990000;">array</span><span style="color: #009900;">(</span><span style="color: #0000ff;">"<span style="color: #660099; font-weight: bold;">\x00</span>"</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">"<span style="color: #660099; font-weight: bold;">\x0a</span>"</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">"<span style="color: #660099; font-weight: bold;">\x0d</span>"</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">"<span style="color: #660099; font-weight: bold;">\x1a</span>"</span><span style="color: #339933;">,</span> <span style="color: #0000ff;">"<span style="color: #660099; font-weight: bold;">\x09</span>"</span><span style="color: #339933;">,</span><span style="color: #0000ff;">"<span style="color: #000099; font-weight: bold;">\\</span>"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
			<span style="color: #000088;">$replace</span> <span style="color: #339933;">=</span> <span style="color: #990000;">array</span><span style="color: #009900;">(</span><span style="color: #0000ff;">'\0'</span><span style="color: #339933;">,</span>   <span style="color: #0000ff;">'\n'</span><span style="color: #339933;">,</span>    <span style="color: #0000ff;">'\r'</span><span style="color: #339933;">,</span>   <span style="color: #0000ff;">'\Z'</span> <span style="color: #339933;">,</span> <span style="color: #0000ff;">'\t'</span><span style="color: #339933;">,</span>  <span style="color: #0000ff;">"<span style="color: #000099; font-weight: bold;">\\</span><span style="color: #000099; font-weight: bold;">\\</span>"</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">switch</span><span style="color: #009900;">(</span><span style="color: #990000;">strtolower</span><span style="color: #009900;">(</span><span style="color: #000088;">$quotestyle</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span><span style="color: #009900;">{</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">'double'</span><span style="color: #339933;">:</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">'d'</span><span style="color: #339933;">:</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">'"'</span><span style="color: #339933;">:</span>
				<span style="color: #000088;">$escapes</span><span style="color: #009900;">[</span><span style="color: #009900;">]</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'"'</span><span style="color: #339933;">;</span>
				<span style="color: #000088;">$replace</span><span style="color: #009900;">[</span><span style="color: #009900;">]</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'\"'</span><span style="color: #339933;">;</span>
				<span style="color: #b1b100;">break</span><span style="color: #339933;">;</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">'single'</span><span style="color: #339933;">:</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">'s'</span><span style="color: #339933;">:</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">"'"</span><span style="color: #339933;">:</span>
				<span style="color: #000088;">$escapes</span><span style="color: #009900;">[</span><span style="color: #009900;">]</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">"'"</span><span style="color: #339933;">;</span>
				<span style="color: #000088;">$replace</span><span style="color: #009900;">[</span><span style="color: #009900;">]</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">"''"</span><span style="color: #339933;">;</span>
				<span style="color: #b1b100;">break</span><span style="color: #339933;">;</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">'both'</span><span style="color: #339933;">:</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">'b'</span><span style="color: #339933;">:</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">'"\''</span><span style="color: #339933;">:</span>
			<span style="color: #b1b100;">case</span> <span style="color: #0000ff;">'\'"'</span><span style="color: #339933;">:</span>
				<span style="color: #000088;">$escapes</span><span style="color: #009900;">[</span><span style="color: #009900;">]</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'"'</span><span style="color: #339933;">;</span>
				<span style="color: #000088;">$replace</span><span style="color: #009900;">[</span><span style="color: #009900;">]</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">'\"'</span><span style="color: #339933;">;</span>
				<span style="color: #000088;">$escapes</span><span style="color: #009900;">[</span><span style="color: #009900;">]</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">"'"</span><span style="color: #339933;">;</span>
				<span style="color: #000088;">$replace</span><span style="color: #009900;">[</span><span style="color: #009900;">]</span> <span style="color: #339933;">=</span> <span style="color: #0000ff;">"''"</span><span style="color: #339933;">;</span>
				<span style="color: #b1b100;">break</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">return</span> <span style="color: #990000;">str_replace</span><span style="color: #009900;">(</span><span style="color: #000088;">$escapes</span><span style="color: #339933;">,</span><span style="color: #000088;">$replace</span><span style="color: #339933;">,</span><span style="color: #000088;">$string</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span> 
&nbsp;
	<span style="color: #000000; font-weight: bold;">function</span> error<span style="color: #009900;">(</span><span style="color: #000088;">$error</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>	
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #339933;">!</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #b1b100;">return</span> <span style="color: #0000ff;">'[ERROR] No Db Handler'</span><span style="color: #339933;">;</span> 
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">if</span><span style="color: #009900;">(</span><span style="color: #990000;">empty</span><span style="color: #009900;">(</span><span style="color: #000088;">$error</span><span style="color: #009900;">)</span><span style="color: #009900;">)</span> <span style="color: #009900;">{</span>
			<span style="color: #b1b100;">return</span> <span style="color: #990000;">sqlite_last_error</span> <span style="color: #009900;">(</span><span style="color: #000088;">$this</span><span style="color: #339933;">-&gt;</span><span style="color: #004000;">db</span><span style="color: #009900;">)</span><span style="color: #339933;">;</span>
		<span style="color: #009900;">}</span>
		<span style="color: #b1b100;">return</span> <span style="color: #000088;">$error</span><span style="color: #339933;">;</span>
	<span style="color: #009900;">}</span>
<span style="color: #009900;">}</span>
<span style="color: #000000; font-weight: bold;">?&gt;</span></pre></td></tr></tbody></table></div>

											</div>
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


</div>
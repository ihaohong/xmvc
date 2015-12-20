<?php
namespace framework\component\Database;

interface IDatabase
{
	function connect($host, $user, $passwd, $dbname);
	function query($sql);
	function close();
}
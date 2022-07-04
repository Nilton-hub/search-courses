<?php
/**
 * @var string|array $courses
 * @return void
 */
function showCourses($courses = []): void
{
	if (gettype($courses) === 'string') {
		echo $courses . PHP_EOL;
		return;
	}
	foreach ($courses as $course) {
		echo $course . PHP_EOL;
	}
}

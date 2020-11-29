<?php
$users = [
    [
        'name' => 'Dima',
        'age' => 25,
        'gender' => 1,
        'profile' => [
            'profession' => 'Developer on "PHP" {}',
            'education'=> 'High School'
        ]
    ],
    [
        'name' => 'Наташа',
        'age' => 18,
        'gender' => 2,
        'profile' => [
            'profession' => 'Дворник',
            'education'=> 'Институ благородных девиц'
        ]
    ],
];

//header('Content-type: application/json');
$json = json_encode($users);
echo $json;
//
//file_put_contents('../users.json', $json);

//$data = json_decode(file_get_contents('../users.json'), true);
//
//var_dump($data);
?>

<script>
    var users = <?=json_encode($users);?>

    for(i in users) {
        alert(users[i].name);
    }
</script>

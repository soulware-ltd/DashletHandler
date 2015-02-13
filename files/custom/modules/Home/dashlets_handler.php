<?php
require_once 'custom/modules/Home/DashletStorage.class.php';

$ds = new DashletStorage();

$method = filter_input(INPUT_POST, 'method');

$pages = $current_user->getPreference('pages', 'Home');
$dashlets = $current_user->getPreference('dashlets', 'Home');

$data = array(
    'dashlets' => $dashlets,
    'pages' => $pages
);



switch($method){
    case 'saveAs':
        $title = filter_input(INPUT_POST, 'title');
        if(!$title)
            break;
        $ds->addDefaultRecord($title, $data);
        break;
    case 'save':
        $ds->save($current_user->id, $data);
        break;

    case 'load':
        $data = $ds->get($current_user->id);
        $data = $data['data'];
        $current_user->setPreference('pages', $data['pages'], null, 'Home');
        $current_user->setPreference('dashlets', $data['dashlets'], null, 'Home');
        break;
    case 'loadFrom':
        $id = filter_input(INPUT_POST, 'saved_dashlets');

        //delete dashlets
        if(isset($_POST['deleteDashlets'])){
            $ds->delete($id);
            break;
        }

        if(!$id)
            break;

        $data = $ds->getDataByID($id);

        if(!$data)
            exit();

        $current_user->setPreference('pages', $data['pages'], null, 'Home');
        $current_user->setPreference('dashlets', $data['dashlets'], null, 'Home');

        break;

    case 'export':
        ob_end_clean();
        header('Content-Type: application/ocetet-stream');
        header('Content-Disposition: attachment; filename=export.dat');
        echo base64_encode(serialize($data));
        exit();
    case 'import':
        if(!isset($_FILES['ufile']))
            break;
        $data = file_get_contents($_FILES['ufile']['tmp_name']);
        $data = unserialize(base64_decode($data));
        var_dump($data);
        $data = unserialize($data);
        var_dump($data);

        exit();

        if(!$data)
            break;

        $current_user->setPreference('pages', $data['pages'], null, 'Home');
        $current_user->setPreference('dashlets', $data['dashlets'], null, 'Home');

        break;
}
header('Location: ' . @$_SERVER['HTTP_REFERER']);

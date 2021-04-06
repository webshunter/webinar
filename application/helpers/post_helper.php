<?php



function clearhtml($value='')
{
    $value = str_replace("<p>", "", $value);
    $value = str_replace("</p>", "", $value);
    $value = str_replace("<div>", "", $value);
    $value = str_replace("</div>", "", $value);
    $value = str_replace("<i>", "", $value);
    $value = str_replace("<b>", "", $value);
    $value = str_replace("</b>", "", $value);
    $value = str_replace("<ol>", "", $value);
    $value = str_replace("</ol>", "", $value);
    $value = str_replace("<table>", "", $value);
    $value = str_replace("</table>", "", $value);
    $value = str_replace("<span>", "", $value);
    $value = str_replace("</span>", "", $value);
    $value = str_replace("<li>", "", $value);
    $value = str_replace("</li>", "", $value);
    $value = str_replace("<br>", "", $value);
    $value = str_replace("&nbsp;", "", $value);

    return $value;
}



function post($data)
{
    if(isset($_POST[$data])){
        return  htmlspecialchars($_POST[$data]);
    }else{
        return "";
    }
}

function slug($data)
{
    $el = $data;
    $el = str_replace(" ", "-", $el);
    $el = str_replace("\"", "", $el);
    $el = str_replace("'", "", $el);
    $el = str_replace("@", "", $el);
    $el = str_replace("!", "", $el);
    $el = str_replace("#", "", $el);
    $el = str_replace("\$", "", $el);
    $el = str_replace("%", "", $el);
    $el = str_replace("^", "", $el);
    $el = str_replace("&", "", $el);
    $el = str_replace("&", "", $el);
    $el = str_replace("*", "", $el);
    $el = str_replace("(", "", $el);
    $el = str_replace(")", "", $el);
    $el = str_replace("+", "", $el);
    $el = str_replace("=", "", $el);
    $el = str_replace("{", "", $el);
    $el = str_replace("}", "", $el);
    $el = str_replace("[", "", $el);
    $el = str_replace("]", "", $el);
    $el = str_replace(":", "", $el);
    $el = str_replace(";", "", $el);
    $el = str_replace("'", "", $el);
    $el = str_replace("<", "", $el);
    $el = str_replace(">", "", $el);
    $el = str_replace("?", "", $el);
    $el = str_replace("/", "", $el);
    $el = str_replace("\\", "", $el);
    $el = str_replace("|", "", $el);
    $el = str_replace("_", "-", $el);
    $el = str_replace("--", "-", $el);
    $el = str_replace("---", "-", $el);
    $el = str_replace("----", "-", $el);
    $el = str_replace("-----", "-", $el);
    $el = $el.'-'.date('y-m-d-h-i-s');
    return $el;
}


function getfile($data, $path, $name)
{
    $data = $_FILES[$data];

    if (!file_exists($path)) {
        mkdir($path);
    }


    // cek if file exist
    if(file_exists($path.'/'.$name.$data['name'])){

        unlink($path.'/'.$name.$data['name']);
        move_uploaded_file($data['tmp_name'], $path.'/'.$name.$data['name']);

    }else{
        move_uploaded_file($data['tmp_name'], $path.'/'.$name.$data['name']);
    }

    return $data['name'];
}


function checkobjk($data = "", $name ="")
{
    if(isset($data->$name)){
        return $data->$name;
    }
    else{
        return "";
    }
}


function get_file($name = "", $path = "")
{
    if (isset($_FILES[$name])) {
        $dataArr = [];
        move_uploaded_file($_FILES[$name]['tmp_name'], $path.$_FILES[$name]['name']);
        $makeData = [
            "path" => $path,
            "name" => $_FILES[$name]['name']
        ];
        return htmlentities(json_encode($makeData));
    }
}

function file_link_decode($data)
{
    $create = html_entity_decode($data);
    $create = json_decode($create);
    $createlink = base_url().$create->path.$create->name;
    return $createlink;
}


function link_button($data)
{
    $html = "<a";
    $html .= " href = '".site_url($data['link'])."'";
    $html .= " class = '".$data['class']."'";
    $html .= " >";
    $html .= $data['text'];
    $html .= "</a>";
    echo $html;
}

function nav_link($data)
{

    $icon = "";

    if(isset($data['icon'])){
        $icon = $data['icon'];
    }

    $title = "";

    if(isset($data['title'])){
        $title = $data['title'];
    }

    $link = "";

    if(isset($data['link'])){
        $link = $data['link'];
    }

    $navigate = "";

    if(isset($data['navigate'])){
        $navigate = $data['navigate'];
    }

    if(!isset($data['cekmultiuser'])){
        $html = '

            <li class="nav-item">
              <a href="'.site_url().''.$link.'" navigate-act nav-name="'.$navigate.'" class="nav-link">
                <i class="nav-icon fas '.$icon.'"></i>
                <p>
                  '.$title.'
                </p>
              </a>
            </li>

        ';
        return $html;
    }else{


        if(in_array($data['cekmultiuser']['user'], $data['cekmultiuser']['cek'])) {
            $html = '

                <li class="nav-item">
                  <a href="'.site_url().''.$link.'" navigate-act nav-name="'.$navigate.'" class="nav-link">
                    <i class="nav-icon fas '.$icon.'"></i>
                    <p>
                      '.$title.'
                    </p>
                  </a>
                </li>
            ';
            return $html;
        }

    }


}

function setNavActive($data = "")
{
    $html = "

    <script>
        let setActiveNav = document.querySelectorAll('[navigate-act]');
        setActiveNav.forEach(NavActive => {
        if(NavActive.getAttribute('nav-name') === '".$data."'){
            NavActive.classList.add('active');
            console.log(NavActive.classList);
        }
        });
    </script>

    ";

    return $html;
}

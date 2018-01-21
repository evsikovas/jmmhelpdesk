<?php
  include('database.php');
  require "auth.php";
  require "header.php";
  if($_SESSION['session']== 1) { //Buh
?>
<!DOCTYPE html>
<html>
<head>
  <title>Нет доступа</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">"Доступ Закрыт, Обратитесь к администратору"</h1>
<?php
  require "footer.php";
?>
</body>
</html>
<?php
  } elseif($_SESSION['session']== 2) {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Нет доступа</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">"Доступ Закрыт, Обратитесь к администратору"</h1>
<?php
  require "footer.php";
?>
</body>
</html>
<?php
} else {
?>
<!DOCTYPE html>
<html>
<head>
  <title>JMM HelpDesk</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="/css/style.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="selectbox.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
  <script src="selectbox.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <style>
  .custom-combobox {
    position: relative;
    display: inline-block;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 5px 10px;
      width: 280px;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $.widget( "custom.combobox", {
      _create: function() {
        this.wrapper = $( "<span>" )
          .addClass( "custom-combobox" )
          .insertAfter( this.element );
        this.element.hide();
        this._createAutocomplete();
        this._createShowAllButton();
      },
      _createAutocomplete: function() {
        var selected = this.element.children( ":selected" ),
          value = selected.val() ? selected.text() : "";
        this.input = $( "<input>" )
          .appendTo( this.wrapper )
          .val( value )
          .attr( "title", "" )
          .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
          .autocomplete({
            delay: 0,
            minLength: 0,
            source: $.proxy( this, "_source" )
          })
          .tooltip({
            classes: {
              "ui-tooltip": "ui-state-highlight"
            }
          });
        this._on( this.input, {
          autocompleteselect: function( event, ui ) {
            ui.item.option.selected = true;
            this._trigger( "select", event, {
              item: ui.item.option
            });
          },
          autocompletechange: "_removeIfInvalid"
        });
      },
      _createShowAllButton: function() {
        var input = this.input,
          wasOpen = false;
        $( "<a>" )
          .attr( "tabIndex", -1 )
          .attr( "title", "Отобразить" )
          .tooltip()
          .appendTo( this.wrapper )
          .button({
            icons: {
              primary: "ui-icon-triangle-1-s"
            },
            text: false
          })
          .removeClass( "ui-corner-all" )
          .addClass( "custom-combobox-toggle ui-corner-right" )
          .on( "mousedown", function() {
            wasOpen = input.autocomplete( "widget" ).is( ":visible" );
          })
          .on( "click", function() {
            input.trigger( "focus" );
            if ( wasOpen ) {
              return;
            }
            input.autocomplete( "search", "" );
          });
      },
      _source: function( request, response ) {
        var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
        response( this.element.children( "option" ).map(function() {
          var text = $( this ).text();
          if ( this.value && ( !request.term || matcher.test(text) ) )
            return {
              label: text,
              value: text,
              option: this
            };
        }) );
      },
      _removeIfInvalid: function( event, ui ) {
        if ( ui.item ) {
          return;
        }
        var value = this.input.val(),
          valueLowerCase = value.toLowerCase(),
          valid = false;
        this.element.children( "option" ).each(function() {
          if ( $( this ).text().toLowerCase() === valueLowerCase ) {
            this.selected = valid = true;
            return false;
          }
        });
        if ( valid ) {
          return;
        }
        this.input
          .val( "" )
          .attr( "title", value + " didn't match any item" )
          .tooltip( "open" );
        this.element.val( "" );
        this._delay(function() {
          this.input.tooltip( "close" ).attr( "title", "" );
        }, 2500 );
        this.input.autocomplete( "instance" ).term = "";
      },
      _destroy: function() {
        this.wrapper.remove();
        this.element.show();
      }
    });
    $( "#combobox1" ).combobox();
    $( "#combobox" ).combobox();
    $( "#combobox2" ).combobox();
    $( "#toggle" ).on( "click", function() {
    $( "#combobox1" ).toggle();
    $( "#combobox" ).toggle();
    $( "#combobox2" ).toggle();
    });
  } );
  </script>
</head>
<body>
  <div>
<?php
  include('database.php');
  if($_SERVER['REQUEST_METHOD']=='POST') {
    $id = mysql_real_escape_string($_POST['id']);
    $name = mysql_real_escape_string($_POST['name']);
    $cid = mysql_real_escape_string($_POST['cid']);
    $phone = mysql_real_escape_string($_POST['phone']);
    $mail = mysql_real_escape_string($_POST['mail']);
    $ip = mysql_real_escape_string($_POST['ip']);
    $port_i = mysql_real_escape_string($_POST['port_i']);
    $port_r = mysql_real_escape_string($_POST['port_r']);
    $port_v = mysql_real_escape_string($_POST['port_v']);
    $pass_router = mysql_real_escape_string($_POST['pass_router']);
    $pass_reg = mysql_real_escape_string($_POST['pass_reg']);
    $po_reg = mysql_real_escape_string($_POST['po_reg']);
    $regions_id = mysql_real_escape_string($_POST['regions_id']);
    $dogovor_pr = mysql_real_escape_string($_POST['dogovor_pr']);
    $provider = mysql_real_escape_string($_POST['provider']);
    $provider_phone = mysql_real_escape_string($_POST['provider_phone']);
    $mask = mysql_real_escape_string($_POST['mask']);
    $gw = mysql_real_escape_string($_POST['gw']);
    $dnsone = mysql_real_escape_string($_POST['dnsone']);
    $dnstwo = mysql_real_escape_string($_POST['dnstwo']);
    $fullname = mysql_real_escape_string($_POST['fullname']);
    $speed = mysql_real_escape_string($_POST['speed']);
    $lan = mysql_real_escape_string($_POST['lan']);
    $nettools = mysql_real_escape_string($_POST['nettools']);
    $conset = mysql_real_escape_string($_POST['conset']);
    $numbbe = mysql_real_escape_string($_POST['numbbe']);
    $numbmeg = mysql_real_escape_string($_POST['numbmeg']);
    $modemgsm = mysql_real_escape_string($_POST['modemgsm']);
    $skypelogin = mysql_real_escape_string($_POST['skypelogin']);
    $skypepass = mysql_real_escape_string($_POST['skypepass']);
    $commentop = mysql_real_escape_string($_POST['commentop']);
    if (empty($name) && empty($phone) && empty($cid)) {
      echo '<h2 align="center" style="color:red;">Заполните все поля</h2>';
    } else {
      $query = "INSERT INTO oplist VALUES (NULL,'$cid','$name','$phone','$ip','$port_i','$port_r','$port_v','$regions_id','$pass_router','$pass_reg','$po_reg','$mail','$dogovor_pr','$provider','$provider_phone','$mask','$gw','$dnsone','$dnstwo','$fullname','$speed','$lan','$nettools','$conset','$numbbe','$numbmeg','$modemgsm','$skypelogin','$skypepass','$commentop')";
      if(mysql_query($query)) {
    echo "ok";
  } else {
    echo "No";
  }
  }
  }
  function getRms() {
    $sql = "SELECT * FROM regionals ORDER BY `id`";
    $query = mysql_query( $sql ) or die ( mysql_error() );
    $array = array();
    $i = 0;
    while ( $row = mysql_fetch_assoc( $query ) ) {
      $array[ $i ][ 'id' ] = $row[ 'id' ];
      $array[ $i ][ 'name' ] = $row[ 'name' ];
      $i++;
    }
    return $array;
  }
  function getDms() {
    $sql = "SELECT * FROM ops ORDER BY `id`";
    $query = mysql_query( $sql ) or die ( mysql_error() );
    $array = array();
    $i = 0;
    while ( $row = mysql_fetch_assoc( $query ) ) {
      $array[ $i ][ 'id' ] = $row[ 'id' ];
      $array[ $i ][ 'name' ] = $row[ 'name' ];
      $i++;
    }
    return $array;
  }
  function getProviders() {
    $sql = "SELECT * FROM provider ORDER BY `id`";
    $query = mysql_query( $sql ) or die ( mysql_error() );
    $array = array();
    $i = 0;
    while ( $row = mysql_fetch_assoc( $query ) ) {
      $array[ $i ][ 'id' ] = $row[ 'id' ];
      $array[ $i ][ 'name' ] = $row[ 'name' ];
      $i++;
    }
    return $array;
  }
  function getRegions() {
    $sql = "SELECT * FROM region ORDER BY `id`";
    $query = mysql_query( $sql ) or die ( mysql_error() );
    $array = array();
    $i = 0;
    while ( $row = mysql_fetch_assoc( $query ) ) {
      $array[ $i ][ 'id' ] = $row[ 'id' ];
      $array[ $i ][ 'name' ] = $row[ 'name' ];
      $i++;
    }
    return $array;
  }
?>
  <h1 align="center" style="color:#358A1E;text-shadow: yellow 0 0 10px;">🏠 Добавление Офиса</h1>
<?php
  echo "<a href='index.php'style='position:relative;left:35%;top:36px;' class='button' >Назад</a></br></br>";
?>
  <form method="POST">
    <table style='margin-left:35%' class='simple-little-table'>
      <tr>
        <th>ID Офиса</th>
        <td><input type="text" name="cid" value=""><br></td>
      </tr>
      <tr>
        <th>Офис Продаж</th>
        <td><input type="text" name="name" value=""><br></td>
      </tr>
      <tr>
        <th>Телефон</th>
        <td><input type="text" name="phone" value=""><br></td>
      </tr>
      <tr>
        <th>E-Mail</th>
        <td><input type="text" name="mail" value=""><br></td>
      </tr>
      <tr>
        <th>IP Адрес</th>
        <td><input type="text" name="ip" value=""><br></td>
      </tr>
      <tr>
        <th>Порт Роутера</th>
        <td><input type="text" name="port_i" value=""><br></td>
      </tr>
      <tr>
        <th>Порт Регистратора</th>
        <td><input type="text" name="port_r" value=""><br></td>
      </tr>
      <tr>
        <th>Видео Порт</th>
        <td><input type="text" name="port_v" value=""><br></td>
      </tr>
      <tr>
        <th>Пароль от роутера</th>
        <td><input type="text" name="pass_router" value=""><br></td>
      </tr>
      <tr>
        <th>Пароль от регистратора</th>
        <td><input type="text" name="pass_reg" value=""><br></td>
      </tr>
      <tr>
        <th>ПО для работы регистратора</th>
        <td><input type="text" name="po_reg" value=""><br></td>
      </tr>
      <tr>
        <th>Провайдера</th>
        <td><input type="text" name="provider" value=""><br></td>
      </tr>
      <tr>
        <th>Договор провайдера</th>
        <td><input type="text" name="dogovor_pr" value=""><br></td>
      </tr>
      <tr>
        <th>Телефон провайдера</th>
        <td><input type="text" name="provider_phone" value=""><br></td>
      </tr>
      <tr>
        <th>Маска Подсети</th>
        <td><input type="text" name="mask" value=""><br></td>
      </tr>
      <tr>
        <th>Шлюз</th>
        <td><input type="text" name="gw" value=""><br></td>
      </tr>
      <tr>
        <th>Первичный DNS</th>
        <td><input type="text" name="dnsone" value=""><br></td>
      </tr>
      <tr>
        <th>Вторичный DNS</th>
        <td><input type="text" name="dnstwo" value=""><br></td>
      </tr>
      <tr>
        <th>Полный Адрес</th>
        <td><textarea type="text" style="height: 50px" name="fullname" value=""></textarea></td>
      </tr>
      <tr>
        <th>Скорость интернета</th>
        <td><input type="text" name="speed" value=""><br></td>
      </tr>
      <tr>
        <th>Внутрения сеть</th>
        <td><input type="text" name="lan" value=""><br></td>
      </tr>
      <tr>
        <th>Сетевое оборудование</th>
        <td><input type="text" name="nettools" value=""><br></td>
      </tr>
      <tr>
        <th>Особености подключения</th>
        <td><input type="text" name="conset" value=""><br></td>
      </tr>
      <tr>
        <th>Номер Билайн</th>
        <td><input type="text" name="numbbe" value=""><br></td>
      </tr>
      <tr>
        <th>Номер Мегафон</th>
        <td><input type="text" name="numbmeg" value=""><br></td>
      </tr>
      <tr>
        <th>Модем GSM</th>
        <td><input type="text" name="modemgsm" value=""><br></td>
      </tr>
      <tr>
        <th>Skype Login</th>
        <td><input type="text" name="skypelogin" value=""><br></td>
      </tr>
      <tr>
        <th>Skype Password</th>
        <td><input type="text" name="skypepass" value=""><br></td>
      </tr>
      <tr>
        <th>Комментарий</th>
        <td><input type="text" name="commentop" value=""><br></td>
      </tr>

  <tr>
    <th>Регион</th>
    <td><div class="selectbox3">
      <select id="combobox2" name="regions_id" value="" >
<?php
  $aRegions = getRegions();
  foreach ( $aRegions as $aRegion) {
    if ($rg == $aRegion[id]) {
      print '<option selected="selected" value="' . $rg . '">' . $aRegion[ 'name' ] . '</option>';
    } else {
      print '<option " value="' . $aRegion[ 'id' ] . '">' . $aRegion[ 'name' ] . '</option>';
    }
  }
?>
  </div>
  </select>
  </div>
  </td>
  </tr>
  <tr>
    <th></th>
    <td>
      <input type="hidden" id="submitbtn" name="id" value="<?=$row['id']?>">
      <input type="submit" value="Отправить" class="button"><br>
    </td>
  </tr>
  </table>
  </form>
  </div>
  </div>
  </div>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
  </br>
<?php
  require "footer.php";
?>
  </body>
  </html>
<?php
}
?>

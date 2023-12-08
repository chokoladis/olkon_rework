$(document).ready(function(){
    
  async function sendQuery(url,postData){
    let send = await fetch(url, postData);
    return send.json();
  }

  $('form#auth').on('submit', (e) => {
    e.preventDefault();
    
    let data = new FormData();
    let inputs = $(this).find('input');
    for (let key of inputs){

      if (key == 'length')
        break;

      data.append($(key).attr('name'), $(key).val())
    }

    let options = {
      method: 'POST',
      body: data
    }
    let response = sendQuery('/include/ajax.php', options)
    // let json = response.json();
    console.log(response);
    // <div class="success">
    //     <span>Вы зашли под логином <b>'.$_SESSION["logged_user"].'</b> </span>
    //     <div class="links">
    //         <a href="clients.php">Клиенты</a>
    //         <a href="logout.php">Выйти</a>
    //     </div>
    // </div>
  });


  $("a.add").click(function(){
    $(".add_form").css("display","block");
  });
});
$(document).ready(function(){
    
  async function auth(url,postData){
    let send = await fetch(url, postData);
    let json = await send.json();
    if (json.success){
        $('header .success').html(`
          <span>Вы зашли под логином <b>`+postData['login']+`</b> </span>
          <div class="links">
              <a href="clients.php">Клиенты</a>
              <a href="logout.php">Выйти</a>
          </div>`)
    } else {
      $('header .error').html(json.error);
    }
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

    let response = auth('/include/ajax.php?action=auth', options)
    console.log(response);
  });


  $("a.add").click(function(){
    $(".add_form").css("display","block");
  });
});
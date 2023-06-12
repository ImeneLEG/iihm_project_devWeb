document.addEventListener('DOMContentLoaded', function() {
    // Place your code here
    $('.rating-open').click(function(event) {
      event.preventDefault();
  
      const link = $(this);
      const href = link.attr('href');
      const dataValue = href.split('=')[1];
  
      $.ajax({
        url: 'reviews.php',
        type: 'POST',
        data: { item: dataValue },
        success: function(response) {
          console.log(response);
          // Handle the response from the PHP script if needed
        },
        error: function() {
          // Handle any errors
        }
      });
    });
  });
  





/* let prodInRev = document.querySelector(".product-in-review");

async function loadReview(api) {
    try {
        let data = await fetch(api);
        let response = await data.json();

        console.log(response);

        const link = await fetch('../template_category.php');
        const html = await link.text();

        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        for (let i = 0; i < response.length; i++) {
            //const anchor = doc.querySelector(`#item-${i}-${title}`);
            const anchor = doc.querySelector(".rating-open");
            anchor.addEventListener('click', function() {
                prodInRev.innerHTML = `
                    <img src="${response[i].image.front}" alt="${response[i].category.name}">
                    <h4>${response[i].title}</h4>
                `;
            })
            break;
        }

        
          
  

    } catch (e) {
        console.log('Error!');
        console.log(e);
    }
}

loadReview('../json_files/t-shirts.json'); */
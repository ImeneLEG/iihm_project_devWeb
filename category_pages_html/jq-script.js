$(document).ready(function(){
    let rating_value = 0;

    $('#add_review').click(function(){
        $('#myModal').modal('show')
    })

    $(document).on('mouseenter','.submit_star',function(){
         let rating = $(this).data('rating')
         resetStar()
         for(var i =1;i<=rating;i++){
             $('#submit_star_'+i).addClass('text-warning')
         }
    })

    function resetStar(){
        for(var i =0;i<=5;i++){
            $('#submit_star_'+i).addClass('star-light')
            $('#submit_star_'+i).removeClass('text-warning')
        }
    }

    $(document).on('click','.submit_star',function(){
        rating_value = $(this).data('rating') 
        for(var i =1;i<=rating_value;i++){
            $('#submit_star_'+i).addClass('text-warning')
        }
    })

    $('#sendReview').click(function(){
        userName  = $('#userName').val()
        userMessage  = $('#userMessage').val()
        if(userName == '' || userMessage == ''){
            alert('Please, Fill both Fields')
            return false;
        }else{
            $.ajax({
                url:'data-submit.php',
                method:'POST',
                data:{rating_value:rating_value, userName:userName, userMessage:userMessage},
                success:function(data){
                    $('#myModal').modal('hide')
                    console.log(data)
                    loadData()
                }
            })
        }


    })

    function loadData(){
        
        $.ajax({
            url:'data-submit.php',
            method:"POST",
            data:{action:'load_data'},
        
            success:function(data){
                var parsedData = JSON.parse(data);

                console.log(parsedData)
                $('#avg_rating').text(parsedData.avgUserRatings)
                $('#total_review').text(parsedData.totalReviews)

                var countStar = 0;
                $('.main_star').each(function(){
                
                        countStar++
                        console.log(Math.ceil(parsedData.avgUserRatings))
                        if(Math.ceil(parsedData.avgUserRatings) >= countStar){
                            $(this).addClass('text-warning')
                            $(this).removeClass('star-light')
                        }
                })
                

                if(parsedData.ratingsList.length > 0){
                    var html = '';
                    for(var count=0;count<parsedData.ratingsList.length;count++){
                        console.log(count)

                        html += `<div class='row mt-2'>`;
                            html += `<div class='col-1'>`;
                            html += `<h1><div class='bg-danger rounded-circle text-center text-white text-uppercase pt-2 pb-2'>${parsedData.ratingsList[count].name.charAt(0)}</div></h1>`;
                            html += `</div>`;
                            html += `<div class='col-11'>`;
                                html += `<div class='card'>`;
                                    html += `<div class='card-header'>`;
                                    html += `${parsedData.ratingsList[count].name}`;
                                        
                                    html += `</div>`;
                                    html += `<div class='card-body'>`;
                                        for(var star = 0; star<5; star++){
                                            if(parsedData.ratingsList[count].rating > star){
                                                className = 'text-warning'
                                            }else{
                                                className = 'star-light'
                                            }

                                            html += `<i class="fa fa-star mr-1 ${className}" ></i>`;
                                        }
                                    html += `<br>${parsedData.ratingsList[count].message}`;
                                    
                                    html += `</div>`;
                                    html += `<div class='card-footer'>`;
                                    html += `${parsedData.ratingsList[count].datetime}`;
                                    
                                    html += `</div>`;
                                html += `</div>`;
                            html += `</div>`;
                        html += `</div>`;


                    }

                }

                $('#display_review').html(html)
                
            } // success
        })
    }

    loadData()
})
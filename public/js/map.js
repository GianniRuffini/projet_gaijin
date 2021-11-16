var $=jQuery
$(document).ready(function(){
    $(".region").mouseenter(function(e){
        console.log($(this).attr('id'));
    })
    var mouseX = 0
    var mouseY = 0
    $(document).mousemove(function(e){
        mouseX = e.pageX+20
        mouseY = e.pageY+20
        $('.info-bulle').css('top',mouseY+'px')
        $('.info-bulle').css('left',mouseX+'px')
        //console.log($('.info-bulle').css('top'));
    })

    $('.region-1').hover(function(e){
        console.log('survol:',$(this).attr(('title')))
        $('.info-bulle').html($(this).attr(('title')))
        $('.info-bulle').show()
        $('.region-1 path').css('fill','red')
        $('.region-list-item').css('background-color','transparent')
        $('.region-1').css('background-color','red') 
    })

    $('.region-1').mouseout(function(e){
        $('.info-bulle').hide()
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-1 path').css('fill','#a4ced2')
    })

    $('.region-2').hover(function(e){
        console.log($(this).attr(('title')))
        $('.info-bulle').html($(this).attr(('title')))
        $('.info-bulle').show()
        $('.region-2 path').css('fill','green') 
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-2').css('background-color', 'green')
    })

    $('.region-2').mouseout(function(e){
        $('.info-bulle').hide()
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-2 path').css('fill','#a4ced2')
    })
    
    $('.region-3').hover(function(e){
        console.log($(this).attr(('title')))
        $('.info-bulle').html($(this).attr(('title')))
        $('.info-bulle').show()
        $('.region-3 path').css('fill','yellow')
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-3').css('background-color', 'yellow')
    })

    $('.region-3').mouseout(function(e){
        $('.info-bulle').hide()
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-3 path').css('fill','#a4ced2')
    })
    
    $('.region-4').hover(function(e){
        console.log($(this).attr(('title')))
        $('.info-bulle').html($(this).attr(('title')))
        $('.info-bulle').show()
        $('.region-4 path').css('fill','blue')
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-4').css('background-color', 'blue')
    })

    $('.region-4').mouseout(function(e){
        $('.info-bulle').hide()
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-4 path').css('fill','#a4ced2')
    })
    
    $('.region-5').hover(function(e){
        console.log($(this).attr(('title')))
        $('.info-bulle').html($(this).attr(('title')))
        $('.info-bulle').show()
        $('.region-5 path').css('fill','purple')
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-5').css('background-color', 'purple')
    })

    $('.region-5').mouseout(function(e){
        $('.info-bulle').hide()
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-5 path').css('fill','#a4ced2')
    })
    
    $('.region-6').hover(function(e){
        console.log($(this).attr(('title')))
        $('.info-bulle').html($(this).attr(('title')))
        $('.info-bulle').show()
        $('.region-6 path').css('fill','orange')
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-6').css('background-color', 'orange')
    })

    $('.region-6').mouseout(function(e){
        $('.info-bulle').hide()
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-6 path').css('fill','#a4ced2')
    })

    $('.region-7').hover(function(e){
        console.log($(this).attr(('title')))
        $('.info-bulle').html($(this).attr(('title')))
        $('.info-bulle').show()
        $('.region-7 path').css('fill','pink')
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-7').css('background-color', 'pink')
    })

    $('.region-7').mouseout(function(e){
        $('.info-bulle').hide()
        $('.region-7 path').css('fill','#a4ced2')
        $('.region-list-item').css('background-color', 'transparent')
    })
    
    $('.region-8').hover(function(e){
        console.log($(this).attr(('title')))
        $('.info-bulle').html($(this).attr(('title')))
        $('.info-bulle').show()
        $('.region-8 path').css('fill','grey')
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-8').css('background-color', 'grey')
    })

    $('.region-8').mouseout(function(e){
        $('.info-bulle').hide()
        $('.region-list-item').css('background-color', 'transparent')
        $('.region-8 path').css('fill','#a4ced2')
    })
    
})
var socket  = new WebSocket('wss://chirukinbb.theweb.place:8080')

socket.onopen  = function () {
    console.log('Connected')
}

if ($('#chat').length){
    var chatId = $('#chat').data('chat-id'),
        userId = $('#chat').data('user-id'),
        template = $('#message').html()

    $('#chat button').on('click',function (event) {
        event.preventDefault()

        socket.send($('#chat-input').val())
        $('#chat-input').val('')
    })

    socket.onmessage = function (msg) {
        var data = JSON.parse(msg.data)

        if (chatId === data.chat){
            var clone = $(template).clone()

            clone.addClass((data.author_id === userId) ? 'owner' : 'guest')
            clone.find('.name').text(data.author)
            clone.find('span').text(data.date)
            clone.find('.content').text(data.message)

            $('#chat .chat-logs').append(clone)
        }else {
            push(data)
        }
    }
}else {
    socket.onmessage = function (msg) {
        push(JSON.parse(msg.data))
    }
}

function push(data) {
    console.log(data)
    var     template = $('#push').html(),
        clone = $(template).clone()

    clone.find('.name').text(data.author)
    clone.find('span').text(data.date)
    clone.find('.content').text(data.message)
    clone.find('a').attr('href','https//chirukinbb.theweb.place/chat/'+data.chat)

    $('body').prepend(clone)
}

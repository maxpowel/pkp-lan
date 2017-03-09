$(document).ready(function(){
    var image = document.getElementById('mapa');

    var options = {};
    var data = [];
    for(var i = 0; i < positions.length; i++){
        var position = positions[i];
        data.push(Taggd.Tag.createFromObject({
                position: { x: position.x/1000, y: position.y/1000 },
                text: position.text
            }))
    }
    data.push(
    /*    Taggd.Tag.createFromObject({
            position: { x: 0.351, y: 0.65 },
            text: 'This is a tree',
        })*/
    )


    var taggd = new Taggd(image, options, data);
});
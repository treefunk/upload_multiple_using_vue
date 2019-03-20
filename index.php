<pre>
<?php

if($_FILES){
    var_dump($_FILES);
}

?>
</pre>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <button @click="addFile">Add file input</button>
        <form action="" method="POST" enctype="multipart/form-data">
        <div v-for="(upload,index) in uploads" style="border: 1px solid black; width:250px; height:150px">
            <button  type="button" @click="remove(index)">X</button>
            <input type="file" :name="`upload_${index}`" :ref="`upload_${index}`">
        </div>
        <button type="submit">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.8/dist/vue.js"></script>
    <script>
    new Vue({
        el: "#app",
        data: function(){
            return {
                uploads: []
            }
        },
        methods: {
            addFile: function(e){
                this.uploads.push({ val: ""})
            },
            remove: function(index){
                if(index != this.uploads.length - 1){
                    for(var x = index; x < this.uploads.length - 1; x++){
                        let f = document.querySelector("input[name='upload_" + x + "'");
                        let next = document.querySelector("input[name='upload_" + (x+1) + "'");
                        let cl = next.cloneNode()
                        cl.setAttribute("name","upload_" + x)
                        f.replaceWith(cl);
                    }
                    this.uploads.splice(this.uploads.length - 1,1)
                }else{
                    this.uploads.splice(index,1)
                }
            }
        }
    })
    
    </script>
</body>
</html>

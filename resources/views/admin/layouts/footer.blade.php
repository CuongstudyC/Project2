<style>
       .box {
        width: 300px;
        height: 300px;
        border: solid 2px #eeeeee;
        position: fixed;
        right: 0;
        bottom: 10%;
        border-collapse: collapse;
        box-shadow: 0 0 10px 0px #eeeeee;
        border-radius: 5%;
        display:none;
    }

    .box .name_user {
        border: solid 2px;
        border-top: none;
        border-left: none;
        border-right: none;
        height: 60px;
        background-color:#3742fa;
        color:white;
        border-radius: 10px;
        cursor: pointer;

    }

    .box .name_user .flex_box {
        display: flex;
        justify-content: space-between;
    }

    .box .name_user .flex_box .name {
        margin-top: 10px;
        padding: 2%;
    }

    .box .name_user button {
        background-color: #ff4757;
        color: white;
        border: solid 1px #ff4757;
        border-radius: 20%;
    }

    #content-chat {
        height: 205px;
        overflow: auto;
        overflow-y: auto;
        color:black;
    }

    .submit-Chat input {
        border: #1e90ff solid 2px;
        border-radius: 20px;
    }

    .submit-Chat input:focus {
        outline: #1e90ff;
    }

    #content-chat div{
        margin:5px 0;
        padding-top:3%;
    }
    #content-chat div span{
        color:white;
        border:solid 2px;
        background-color: #1e90ff;
        border-radius: 20px;
        padding: 2%;

    }
</style>

<footer class="main-footer">

    <div class="box">
        {{-- <div class="name_user">
            <div class="flex_box">
                <div class="name">User</div>
                <div><button>x</button></div>
            </div>
        </div>
        <div id="content-chat">

            <div><span>123</span></div>
        </div>
        <div style="text-align: center;" class="submit-Chat">
            <input type="text" style="width:80%;" name="userValue" onkeydown="Button_Chat(event)">
        </div> --}}
    </div>



    <strong>Copyright &copy; 2023-2024 <span style="color:#1e90ff;text-decoration: underline;">Group 1<span>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Project</b> 2
    </div>
  </footer>

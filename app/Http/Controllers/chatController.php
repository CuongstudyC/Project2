<?php

namespace App\Http\Controllers;

use App\Models\admin_remember;
use App\Models\chatBox;
use App\Models\chatBoxDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chatController extends Controller
{
    function navChat()
    {
        $chatBox = chatBox::all();
        $name = [];
        $image = [];
        $chatId = [];
        foreach ($chatBox as $chat) {
            if (!empty($chat->relatedUsers->name)) {
                $chatId[] = $chat->id;
                $name[] = $chat->relatedUsers->name;
                if (!empty($chat->relatedUsers->image)) {
                    $image[] = $chat->relatedUsers->image;
                } else {
                    $image[] = "product_noImage.png";
                }
            }
        }
        return response()->json([
            'chatId' => $chatId,
            'name' => $name,
            'image' => $image,
        ]);
    }

    function displayChat($id)
    {
        $contentChat = chatBoxDetail::where('chat_id', $id)->get();
        return response()->json([
            'content' => $contentChat
        ]);
    }

    function submitChatAdmin($id, $value)
    {
        if(trim($value) != ""){
            if (session('id')) {
                $getAdminId = session('id');
            } else {
                $adminRemember = admin_remember::all();
                foreach ($adminRemember as $re) {
                    $getAdminId = $re->admin_id;
                }
            }
            $newContentChat = new chatBoxDetail();
            $newContentChat->content = $value;
            $newContentChat->admin_id = $getAdminId;
            $newContentChat->chat_id = $id;
            $newContentChat->save();
        }

        $contentChat = chatBoxDetail::where('chat_id', $id)->get();
        return response()->json([
            'content' => $contentChat
        ]);
    }

    function submitChatUser($value){
        if(trim($value) != ""){
            if(Auth::check()){
                $user = Auth::user();
                $boxChat = chatBox::where('user_id',$user->id)->first();
                if(empty($boxChat)){
                    $boxChat = new chatBox();
                    $boxChat->user_id = $user->id;
                    $boxChat->save();
                }

                $newContentChat = new chatBoxDetail();
                $newContentChat->content = $value;
                $newContentChat->chat_id = $user->relatedChatBox->id;
                $newContentChat->save();
                $contentChat = chatBoxDetail::where('chat_id', $user->relatedChatBox->id)->get();
                return response()->json([
                    'content' => $contentChat
                ]);
            }
        }
    }
    function displayChatUser(){
        if(Auth::check()){
            $user = Auth::user();
            if(!empty($user->relatedChatBox->id)){
                $contentChat = chatBoxDetail::where('chat_id', $user->relatedChatBox->id)->get();
                if(count($contentChat) > 0){
                    return response()->json([
                        'content' => $contentChat
                    ]);
                }
            }
        }
        return response()->json([
            'content' => 0
        ]);
    }
}

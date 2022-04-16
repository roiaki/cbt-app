<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        //�p�ӂ�������z��Ɉ����œn����lang�����鎞�A
        //�Z�b�V������key(applocale)�Fvalue($lang)��ۑ�����
        if (array_key_exists($lang, Config::get('languages'))) {
            Session::put('applocale', $lang);
        }
        return Redirect::back();
    }
}

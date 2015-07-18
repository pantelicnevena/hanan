<?php

/* viewtopic_topic_tools.html */
class __TwigTemplate_7239859d608c5a6d00a7ea60b492fd23 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if (((!(isset($context["S_IS_BOT"]) ? $context["S_IS_BOT"] : null)) && ((((((isset($context["U_WATCH_TOPIC"]) ? $context["U_WATCH_TOPIC"] : null) || (isset($context["U_BOOKMARK_TOPIC"]) ? $context["U_BOOKMARK_TOPIC"] : null)) || (isset($context["U_BUMP_TOPIC"]) ? $context["U_BUMP_TOPIC"] : null)) || (isset($context["U_EMAIL_TOPIC"]) ? $context["U_EMAIL_TOPIC"] : null)) || (isset($context["U_PRINT_TOPIC"]) ? $context["U_PRINT_TOPIC"] : null)) || (isset($context["S_DISPLAY_TOPIC_TOOLS"]) ? $context["S_DISPLAY_TOPIC_TOOLS"] : null)))) {
            // line 2
            echo "\t<div class=\"dropdown-container dropdown-button-control topic-tools\">
\t\t<span title=\"";
            // line 3
            echo $this->env->getExtension('phpbb')->lang("TOPIC_TOOLS");
            echo "\" class=\"button icon-button tools-icon dropdown-trigger dropdown-select\"></span>
\t\t<div class=\"dropdown hidden\">
\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t<ul class=\"dropdown-contents\">
\t\t\t\t";
            // line 7
            // line 8
            echo "\t\t\t\t";
            if ((isset($context["U_WATCH_TOPIC"]) ? $context["U_WATCH_TOPIC"] : null)) {
                // line 9
                echo "\t\t\t\t\t<li class=\"small-icon icon-";
                if ((isset($context["S_WATCHING_TOPIC"]) ? $context["S_WATCHING_TOPIC"] : null)) {
                    echo "unsubscribe";
                } else {
                    echo "subscribe";
                }
                echo "\">
\t\t\t\t\t\t<a href=\"";
                // line 10
                echo (isset($context["U_WATCH_TOPIC"]) ? $context["U_WATCH_TOPIC"] : null);
                echo "\" class=\"watch-topic-link\" title=\"";
                echo (isset($context["S_WATCH_TOPIC_TITLE"]) ? $context["S_WATCH_TOPIC_TITLE"] : null);
                echo "\" data-ajax=\"toggle_link\" data-toggle-class=\"small-icon icon-";
                if ((!(isset($context["S_WATCHING_TOPIC"]) ? $context["S_WATCHING_TOPIC"] : null))) {
                    echo "unsubscribe";
                } else {
                    echo "subscribe";
                }
                echo "\" data-toggle-text=\"";
                echo (isset($context["S_WATCH_TOPIC_TOGGLE"]) ? $context["S_WATCH_TOPIC_TOGGLE"] : null);
                echo "\" data-toggle-url=\"";
                echo (isset($context["U_WATCH_TOPIC_TOGGLE"]) ? $context["U_WATCH_TOPIC_TOGGLE"] : null);
                echo "\" data-update-all=\".watch-topic-link\">";
                echo (isset($context["S_WATCH_TOPIC_TITLE"]) ? $context["S_WATCH_TOPIC_TITLE"] : null);
                echo "</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 13
            echo "\t\t\t\t";
            if ((isset($context["U_BOOKMARK_TOPIC"]) ? $context["U_BOOKMARK_TOPIC"] : null)) {
                // line 14
                echo "\t\t\t\t\t<li class=\"small-icon icon-bookmark\">
\t\t\t\t\t\t<a href=\"";
                // line 15
                echo (isset($context["U_BOOKMARK_TOPIC"]) ? $context["U_BOOKMARK_TOPIC"] : null);
                echo "\" class=\"bookmark-link\" title=\"";
                echo $this->env->getExtension('phpbb')->lang("BOOKMARK_TOPIC");
                echo "\" data-ajax=\"alt_text\" data-alt-text=\"";
                echo (isset($context["S_BOOKMARK_TOGGLE"]) ? $context["S_BOOKMARK_TOGGLE"] : null);
                echo "\" data-update-all=\".bookmark-link\">";
                echo (isset($context["S_BOOKMARK_TOPIC"]) ? $context["S_BOOKMARK_TOPIC"] : null);
                echo "</a>
\t\t\t\t\t</li>
\t\t\t\t";
            }
            // line 18
            echo "\t\t\t\t";
            if ((isset($context["U_BUMP_TOPIC"]) ? $context["U_BUMP_TOPIC"] : null)) {
                echo "<li class=\"small-icon icon-bump\"><a href=\"";
                echo (isset($context["U_BUMP_TOPIC"]) ? $context["U_BUMP_TOPIC"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb')->lang("BUMP_TOPIC");
                echo "\" data-ajax=\"true\">";
                echo $this->env->getExtension('phpbb')->lang("BUMP_TOPIC");
                echo "</a></li>";
            }
            // line 19
            echo "\t\t\t\t";
            if ((isset($context["U_EMAIL_TOPIC"]) ? $context["U_EMAIL_TOPIC"] : null)) {
                echo "<li class=\"small-icon icon-sendemail\"><a href=\"";
                echo (isset($context["U_EMAIL_TOPIC"]) ? $context["U_EMAIL_TOPIC"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb')->lang("EMAIL_TOPIC");
                echo "\">";
                echo $this->env->getExtension('phpbb')->lang("EMAIL_TOPIC");
                echo "</a></li>";
            }
            // line 20
            echo "\t\t\t\t";
            if ((isset($context["U_PRINT_TOPIC"]) ? $context["U_PRINT_TOPIC"] : null)) {
                echo "<li class=\"small-icon icon-print\"><a href=\"";
                echo (isset($context["U_PRINT_TOPIC"]) ? $context["U_PRINT_TOPIC"] : null);
                echo "\" title=\"";
                echo $this->env->getExtension('phpbb')->lang("PRINT_TOPIC");
                echo "\" accesskey=\"p\">";
                echo $this->env->getExtension('phpbb')->lang("PRINT_TOPIC");
                echo "</a></li>";
            }
            // line 21
            echo "\t\t\t\t";
            // line 22
            echo "\t\t\t</ul>
\t\t</div>
\t</div>
";
        }
    }

    public function getTemplateName()
    {
        return "viewtopic_topic_tools.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 21,  93 => 19,  82 => 18,  67 => 14,  64 => 13,  44 => 10,  35 => 9,  32 => 8,  24 => 3,  21 => 2,  1457 => 402,  1454 => 401,  1448 => 398,  1436 => 397,  1433 => 396,  1431 => 395,  1428 => 394,  1416 => 393,  1415 => 392,  1410 => 389,  1406 => 387,  1400 => 385,  1397 => 384,  1384 => 383,  1382 => 382,  1378 => 381,  1375 => 380,  1373 => 379,  1370 => 378,  1364 => 374,  1349 => 372,  1345 => 371,  1341 => 370,  1332 => 366,  1325 => 365,  1323 => 364,  1320 => 363,  1308 => 362,  1304 => 360,  1303 => 359,  1300 => 358,  1296 => 356,  1290 => 355,  1273 => 354,  1271 => 353,  1268 => 352,  1267 => 351,  1263 => 349,  1262 => 348,  1259 => 347,  1253 => 343,  1248 => 341,  1240 => 340,  1232 => 339,  1230 => 338,  1224 => 336,  1222 => 335,  1219 => 334,  1205 => 332,  1203 => 331,  1200 => 330,  1195 => 328,  1184 => 322,  1178 => 318,  1177 => 317,  1174 => 316,  1165 => 315,  1163 => 314,  1157 => 313,  1154 => 312,  1150 => 310,  1141 => 309,  1137 => 308,  1134 => 307,  1130 => 305,  1121 => 304,  1117 => 303,  1114 => 302,  1111 => 301,  1104 => 300,  1103 => 299,  1100 => 298,  1096 => 296,  1087 => 294,  1083 => 293,  1078 => 291,  1074 => 289,  1072 => 288,  1067 => 286,  1064 => 285,  1056 => 282,  1053 => 281,  1051 => 280,  1048 => 279,  1041 => 275,  1037 => 274,  1033 => 273,  1029 => 272,  1025 => 271,  1019 => 269,  1012 => 265,  1008 => 264,  1004 => 263,  1000 => 262,  996 => 261,  990 => 259,  988 => 258,  985 => 257,  984 => 256,  965 => 255,  964 => 254,  961 => 253,  959 => 252,  956 => 251,  952 => 249,  950 => 248,  940 => 245,  937 => 244,  934 => 243,  924 => 240,  921 => 239,  918 => 238,  908 => 235,  905 => 234,  902 => 233,  892 => 230,  889 => 229,  886 => 228,  876 => 225,  873 => 224,  870 => 223,  860 => 220,  857 => 219,  854 => 218,  853 => 217,  850 => 216,  847 => 215,  844 => 214,  843 => 213,  821 => 211,  811 => 209,  808 => 208,  802 => 205,  798 => 204,  793 => 203,  787 => 200,  783 => 199,  778 => 198,  775 => 197,  773 => 196,  767 => 192,  765 => 191,  758 => 186,  752 => 185,  748 => 183,  746 => 182,  739 => 180,  721 => 179,  717 => 177,  714 => 176,  710 => 175,  707 => 174,  703 => 173,  694 => 169,  688 => 167,  685 => 166,  682 => 165,  681 => 164,  678 => 163,  676 => 162,  670 => 161,  659 => 159,  656 => 158,  651 => 157,  650 => 156,  647 => 155,  639 => 153,  636 => 152,  634 => 151,  631 => 150,  621 => 149,  611 => 148,  594 => 147,  591 => 146,  581 => 145,  577 => 143,  575 => 142,  566 => 141,  565 => 140,  562 => 139,  560 => 138,  557 => 137,  544 => 136,  541 => 135,  540 => 134,  525 => 132,  517 => 131,  489 => 128,  479 => 126,  476 => 125,  474 => 124,  470 => 123,  467 => 122,  458 => 116,  454 => 115,  447 => 111,  444 => 110,  436 => 107,  432 => 105,  430 => 104,  427 => 103,  421 => 100,  417 => 98,  415 => 97,  406 => 94,  399 => 92,  396 => 91,  390 => 90,  389 => 89,  376 => 87,  353 => 86,  327 => 85,  315 => 84,  297 => 83,  295 => 82,  291 => 81,  277 => 78,  273 => 77,  263 => 71,  261 => 70,  257 => 68,  255 => 67,  251 => 65,  245 => 63,  242 => 62,  229 => 61,  227 => 60,  216 => 59,  213 => 58,  211 => 57,  208 => 56,  200 => 51,  192 => 50,  186 => 49,  182 => 48,  177 => 46,  174 => 45,  172 => 44,  169 => 43,  157 => 42,  153 => 40,  152 => 39,  149 => 38,  145 => 36,  139 => 35,  122 => 34,  120 => 33,  117 => 22,  116 => 31,  110 => 27,  104 => 20,  99 => 21,  94 => 20,  86 => 18,  84 => 17,  75 => 14,  73 => 13,  70 => 15,  57 => 9,  54 => 8,  52 => 7,  49 => 6,  43 => 5,  34 => 3,  31 => 7,  19 => 1,);
    }
}

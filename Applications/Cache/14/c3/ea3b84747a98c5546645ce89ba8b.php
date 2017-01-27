<?php

/* home.nt */
class __TwigTemplate_14c3ea3b84747a98c5546645ce89ba8b extends Twig_Template
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
        echo "<!doctype html>
<html lang=\"";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["lang"]) ? $context["lang"] : null), "html", null, true);
        echo "\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
    ";
        // line 8
        echo (isset($context["head"]) ? $context["head"] : null);
        echo "
</head>
<body class=\"nt-color-default\">
    <div class=\"customize\">
    </div>
    <div class=\"general\">
        <div class=\"neptunefw\">
            <div class=\"neptune-logo\">
                <img src=\"";
        // line 16
        echo twig_escape_filter($this->env, (isset($context["logo"]) ? $context["logo"] : null), "html", null, true);
        echo "\"/>
            </div>
            <div class=\"neptune nt-text-color-default\">";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["neptune"]) ? $context["neptune"] : null), "html", null, true);
        echo "</div>
            <div class=\"framework nt-text-color-default\">";
        // line 19
        echo (isset($context["framework"]) ? $context["framework"] : null);
        echo "</div>
            <div class=\"version nt-text-color-default\">";
        // line 20
        echo (isset($context["version"]) ? $context["version"] : null);
        echo "</div>
            <div class=\"copyright nt-text-color-default\"> &copy; ";
        // line 21
        echo (isset($context["copyright"]) ? $context["copyright"] : null);
        echo "</div>
            <div class=\"languages nt-text-color-default\">
                <ul>
                    <li class=\"nt-text-color-default\">
                        <a nt-lang=\"tr_TR\" class=\"nt-text-color-default\">";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["Turkish"]) ? $context["Turkish"] : null), "html", null, true);
        echo "</a>
                        <a nt-lang=\"en_US\" class=\"nt-text-color-default\">";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["English"]) ? $context["English"] : null), "html", null, true);
        echo "</a>
                        <a nt-lang=\"ar_AR\" class=\"nt-text-color-default\">";
        // line 27
        echo twig_escape_filter($this->env, (isset($context["Arabic"]) ? $context["Arabic"] : null), "html", null, true);
        echo "</a>
                    </li>
                </ul>
            </div>
            <div class=\"color-switcher\">
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\"  nt-switch-color=\"white\" nt-switch-text-color=\"grey\" ";
        // line 33
        echo twig_escape_filter($this->env, (isset($context["white"]) ? $context["white"] : null), "html", null, true);
        echo "  name=\"color\">
                    <span class=\"radio  nt-color-white\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color \" nt-switch-color=\"red\" ";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["red"]) ? $context["red"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio nt-color-red\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"pink\" ";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["pink"]) ? $context["pink"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio  nt-color-pink\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"purple\" ";
        // line 45
        echo twig_escape_filter($this->env, (isset($context["purple"]) ? $context["purple"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio  nt-color-purple\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color \" nt-switch-color=\"deep-purple\" ";
        // line 49
        echo twig_escape_filter($this->env, (isset($context["deep_purple"]) ? $context["deep_purple"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio nt-color-deep-purple\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color \" nt-switch-color=\"indigo\" ";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["indigo"]) ? $context["indigo"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio nt-color-indigo\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color \" nt-switch-color=\"blue\" ";
        // line 57
        echo twig_escape_filter($this->env, (isset($context["blue"]) ? $context["blue"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio nt-color-blue\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"light-blue\" ";
        // line 61
        echo twig_escape_filter($this->env, (isset($context["light_blue"]) ? $context["light_blue"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio  nt-color-light-blue\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color \" nt-switch-color=\"cyan\" ";
        // line 65
        echo twig_escape_filter($this->env, (isset($context["cyan"]) ? $context["cyan"] : null), "html", null, true);
        echo " nt-switch-text-color=\"brown\" name=\"color\">
                    <span class=\"radio nt-color-cyan\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"teal\" ";
        // line 69
        echo twig_escape_filter($this->env, (isset($context["teal"]) ? $context["teal"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio  nt-color-teal\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"green\" ";
        // line 73
        echo twig_escape_filter($this->env, (isset($context["green"]) ? $context["green"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio  nt-color-green\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"light-green\" ";
        // line 77
        echo twig_escape_filter($this->env, (isset($context["light_green"]) ? $context["light_green"] : null), "html", null, true);
        echo " nt-switch-text-color=\"black\" name=\"color\">
                    <span class=\"radio  nt-color-light-green\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"lime\" ";
        // line 81
        echo twig_escape_filter($this->env, (isset($context["lime"]) ? $context["lime"] : null), "html", null, true);
        echo " nt-switch-text-color=\"pink\" name=\"color\">
                    <span class=\"radio  nt-color-lime\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color \" nt-switch-color=\"yellow\" ";
        // line 85
        echo twig_escape_filter($this->env, (isset($context["yellow"]) ? $context["yellow"] : null), "html", null, true);
        echo " nt-switch-text-color=\"red\" name=\"color\">
                    <span class=\"radio nt-color-yellow\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color \" nt-switch-color=\"amber\" ";
        // line 89
        echo twig_escape_filter($this->env, (isset($context["amber"]) ? $context["amber"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio nt-color-amber\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"orange\" ";
        // line 93
        echo twig_escape_filter($this->env, (isset($context["orange"]) ? $context["orange"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio nt-color-orange\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"deep-orange\" ";
        // line 97
        echo twig_escape_filter($this->env, (isset($context["deep_orange"]) ? $context["deep_orange"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio nt-color-deep-orange\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"grey\" ";
        // line 101
        echo twig_escape_filter($this->env, (isset($context["grey"]) ? $context["grey"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio  nt-color-grey\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"blue-grey\" ";
        // line 105
        echo twig_escape_filter($this->env, (isset($context["blue_grey"]) ? $context["blue_grey"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio nt-color-blue-grey\"></span>
                </label>
                <label class=\"radio\">
                    <input type=\"radio\" class=\"color\" nt-switch-color=\"black\" ";
        // line 109
        echo twig_escape_filter($this->env, (isset($context["black"]) ? $context["black"] : null), "html", null, true);
        echo " nt-switch-text-color=\"white\" name=\"color\">
                    <span class=\"radio nt-color-black\"></span>
                </label>
            </div>
        </div>
    </div>
    ";
        // line 115
        echo (isset($context["body"]) ? $context["body"] : null);
        echo "
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "home.nt";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  228 => 115,  219 => 109,  212 => 105,  205 => 101,  198 => 97,  191 => 93,  184 => 89,  177 => 85,  170 => 81,  163 => 77,  156 => 73,  149 => 69,  142 => 65,  135 => 61,  128 => 57,  121 => 53,  114 => 49,  107 => 45,  100 => 41,  93 => 37,  86 => 33,  77 => 27,  73 => 26,  69 => 25,  62 => 21,  58 => 20,  54 => 19,  50 => 18,  45 => 16,  34 => 8,  30 => 7,  22 => 2,  19 => 1,);
    }
}

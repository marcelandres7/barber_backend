<?php

/* AppBundle:Backend:base.html.twig */
class __TwigTemplate_10e135ef071f5585f278a983c881ef3b42dec4ddca0b4581b78c564312414a27 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'extra_css' => array($this, 'block_extra_css'),
            'content' => array($this, 'block_content'),
            'firstInBody' => array($this, 'block_firstInBody'),
            'body' => array($this, 'block_body'),
            'extra_scripts' => array($this, 'block_extra_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "AppBundle:Backend:base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>\t\t

        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
        <title>";
        // line 8
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        ";
        // line 10
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 42
        echo "
        <!-- JQuery -->
        <script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/jquery/js/jquery.min.js"), "html", null, true);
        echo "\"></script>

        ";
        // line 46
        $this->displayBlock('extra_css', $context, $blocks);
        // line 48
        echo "
        ";
        // line 50
        echo "    </head>
    <body>

        <!-- [ Pre-loader ] start -->
        <div id=\"loader\" class=\"loader-bg\">
            <div class=\"loader-track\">
                <div class=\"loader-fill\"></div>
            </div>
        </div>
        <!-- [ Pre-loader ] End -->

        ";
        // line 61
        $context["user_agent"] = $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "server", array()), "get", array(0 => "HTTP_USER_AGENT"), "method");
        // line 62
        echo "        ";
        if (((twig_in_filter("Microsoft Internet Explorer", (isset($context["user_agent"]) ? $context["user_agent"] : $this->getContext($context, "user_agent"))) || twig_in_filter("Trident", (isset($context["user_agent"]) ? $context["user_agent"] : $this->getContext($context, "user_agent")))) || twig_in_filter("rv:11", (isset($context["user_agent"]) ? $context["user_agent"] : $this->getContext($context, "user_agent"))))) {
            // line 63
            echo "            <div style=\"background-color:#FFF3CD;color:#856404;padding:20px;text-align:center;\">
                &#x26a0; &nbsp;
                Tu navegador no es compatible con este sitio. Por favor utiliza Chrome o Firefox ";
            // line 65
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "request", array()), "server", array()), "get", array(0 => "HTTP_USER_AGENT"), "method"), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 68
        echo "        ";
        $this->displayBlock('content', $context, $blocks);
        // line 69
        echo "        ";
        $this->displayBlock('firstInBody', $context, $blocks);
        // line 70
        echo "
        <!-- Left side column. contains the logo and sidebar -->
        ";
        // line 72
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("AppBundle:Backend/Main:mainMenu"));
        echo "\t

        <header class=\"navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue\">

            <div class=\"m-header\">
                <a class=\"mobile-menu\" id=\"mobile-collapse1\" href=\"#!\"><span></span></a>
                <img src=\"";
        // line 78
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/we_logo.png"), "html", null, true);
        echo "\" style='max-width:80px'>
            </div>
            <a class=\"mobile-menu\" id=\"mobile-header\" href=\"#!\">
                <i class=\"feather icon-more-horizontal\"></i>
            </a>
            <div class=\"collapse navbar-collapse\">
                <ul class=\"navbar-nav mr-auto\">
                    <li><a href=\"#!\" class=\"full-screen\" onclick=\"javascript:toggleFullScreen()\"><i class=\"feather icon-maximize\"></i></a></li>
                    <li>
                        ";
        // line 87
        if (($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "userRole", array()), "id", array()) == 5)) {
            // line 88
            echo "                            ";
            echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "organization", array()), "name", array())), "html", null, true);
            echo "
                        ";
        }
        // line 90
        echo "                    </li>
                </ul>
                <ul class=\"navbar-nav ml-auto\">
                    <li>
                        ";
        // line 94
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->controller("AppBundle:Backend/Main:profile"));
        echo "
                    </li>
                </ul>
            </div>

        </header>

        <!-- Main container. Contains page content -->
        <div class=\"pcoded-main-container\">
            <div class=\"pcoded-wrapper\">
                <div class=\"pcoded-content\">
                    <div class=\"pcoded-inner-content\">
                        ";
        // line 106
        $this->displayBlock('body', $context, $blocks);
        // line 108
        echo "                    </div>
                </div>
            </div>
        </div>
        <!-- /.pcoded-main-container -->

        ";
        // line 120
        echo "



        <!-- DattaAble -->
        <script src=\"";
        // line 125
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/js/vendor-all.min.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 127
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/bootstrap/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>

        ";
        // line 130
        echo "
        <script src=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/js/pcoded.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/pnotify/js/pnotify.custom.min.js"), "html", null, true);
        echo "\"></script>
        ";
        // line 135
        echo "
        ";
        // line 140
        echo "
        <script src=\"";
        // line 141
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/jquery-validate/jquery.validate.min.js"), "html", null, true);
        echo "\"></script>

        ";
        // line 144
        echo "
        <script src=\"";
        // line 145
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/data-tables/js/datatables.min.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 147
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/select2/js/select2.full.min.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 149
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/ckeditor/js/ckeditor.js"), "html", null, true);
        echo "\"></script>

        <script src=\"http://momentjs.com/downloads/moment-with-locales.min.js\"></script>

        <script src=\"";
        // line 153
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 155
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/lightbox2-master/js/lightbox.min.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 157
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/sweetalert/js/sweetalert.min.js"), "html", null, true);
        echo "\"></script>

        <script src=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/inputmask/js/inputmask.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/inputmask/js/jquery.inputmask.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/inputmask/js/autoNumeric.js"), "html", null, true);
        echo "\"></script>
        <script src=\"https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js\"></script>
        <script type=\"text/javascript\">
                        var idioma_español = {
                            \"sProcessing\": \"Procesando...\",
                            \"sLengthMenu\": \"Mostrar _MENU_ registros\",
                            \"sZeroRecords\": \"No se encontraron resultados\",
                            \"sEmptyTable\": \"Ningún dato disponible en esta tabla\",
                            \"sInfo\": \"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros\",
                            \"sInfoEmpty\": \"Mostrando registros del 0 al 0 de un total de 0 registros\",
                            \"sInfoFiltered\": \"(filtrado de un total de _MAX_ registros)\",
                            \"sInfoPostFix\": \"\",
                            \"sSearch\": \"Buscar:\",
                            \"sUrl\": \"\",
                            \"sInfoThousands\": \",\",
                            \"sLoadingRecords\": \"Cargando...\",
                            \"oPaginate\": {
                                \"sFirst\": \"Primero\",
                                \"sLast\": \"Último\",
                                \"sNext\": \"Siguiente\",
                                \"sPrevious\": \"Anterior\"
                            },
                            \"oAria\": {
                                \"sSortAscending\": \": Activar para ordenar la columna de manera ascendente\",
                                \"sSortDescending\": \": Activar para ordenar la columna de manera descendente\"
                            }
                        };
        </script>

        ";
        // line 190
        $this->displayBlock('extra_scripts', $context, $blocks);
        // line 193
        echo "

    </body>
</html>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 8
    public function block_title($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "PRLM";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 10
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 11
        echo "
            <!-- Font Awesome -->
            <link rel=\"stylesheet\" href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/fonts/fontawesome/css/fontawesome-all.min.css"), "html", null, true);
        echo "\">

            <!-- Animate -->
            <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/animation/css/animate.min.css"), "html", null, true);
        echo "\">

            <!-- PNotify -->
            <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/pnotify/css/pnotify.custom.min.css"), "html", null, true);
        echo "\">

            <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/css/pages/pnotify.css"), "html", null, true);
        echo "\">

            <!-- DattaAble -->
            <link rel=\"stylesheet\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/css/style.css"), "html", null, true);
        echo "\">

            ";
        // line 30
        echo "
            <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/data-tables/css/datatables.min.css"), "html", null, true);
        echo "\">

            <link rel=\"stylesheet\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/select2/css/select2.min.css"), "html", null, true);
        echo "\">

            <link rel=\"stylesheet\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css"), "html", null, true);
        echo "\">
            <link rel=\"stylesheet\" href=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("bundles/dattaAble/assets/plugins/lightbox2-master/css/lightbox.min.css"), "html", null, true);
        echo "\">

            <!-- Custom CSS -->
            <link href=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("css/backend/styleNew.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 46
    public function block_extra_css($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_css"));

        // line 47
        echo "        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 68
    public function block_content($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 69
    public function block_firstInBody($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "firstInBody"));

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 106
    public function block_body($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 107
        echo "                        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 190
    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 191
        echo "
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "AppBundle:Backend:base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  422 => 191,  416 => 190,  409 => 107,  403 => 106,  392 => 69,  381 => 68,  374 => 47,  368 => 46,  358 => 39,  352 => 36,  348 => 35,  343 => 33,  338 => 31,  335 => 30,  330 => 24,  324 => 21,  319 => 19,  313 => 16,  307 => 13,  303 => 11,  297 => 10,  285 => 8,  274 => 193,  272 => 190,  240 => 161,  236 => 160,  232 => 159,  227 => 157,  222 => 155,  217 => 153,  210 => 149,  205 => 147,  200 => 145,  197 => 144,  192 => 141,  189 => 140,  186 => 135,  182 => 133,  177 => 131,  174 => 130,  169 => 127,  164 => 125,  157 => 120,  149 => 108,  147 => 106,  132 => 94,  126 => 90,  120 => 88,  118 => 87,  106 => 78,  97 => 72,  93 => 70,  90 => 69,  87 => 68,  81 => 65,  77 => 63,  74 => 62,  72 => 61,  59 => 50,  56 => 48,  54 => 46,  49 => 44,  45 => 42,  43 => 10,  38 => 8,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
    <head>\t\t

        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\" />
        <title>{% block title %}PRLM{% endblock %}</title>

        {% block stylesheets %}

            <!-- Font Awesome -->
            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}\">

            <!-- Animate -->
            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/animation/css/animate.min.css') }}\">

            <!-- PNotify -->
            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/pnotify/css/pnotify.custom.min.css') }}\">

            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/css/pages/pnotify.css') }}\">

            <!-- DattaAble -->
            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/css/style.css') }}\">

            {#<!-- jvectormap -->
            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/vector-maps/css/jquery-jvectormap-2.0.2.css') }}\">

            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css') }}\">#}

            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/data-tables/css/datatables.min.css') }}\">

            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/select2/css/select2.min.css') }}\">

            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}\">
            <link rel=\"stylesheet\" href=\"{{ asset('bundles/dattaAble/assets/plugins/lightbox2-master/css/lightbox.min.css') }}\">

            <!-- Custom CSS -->
            <link href=\"{{ asset('css/backend/styleNew.css') }}\" rel=\"stylesheet\">

        {% endblock %}

        <!-- JQuery -->
        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/jquery/js/jquery.min.js') }}\"></script>

        {% block extra_css %}
        {% endblock %}

        {#<link rel=\"icon\" type=\"image/x-icon\" href=\"{{ asset('images/logo_small.jpg') }}\" />#}
    </head>
    <body>

        <!-- [ Pre-loader ] start -->
        <div id=\"loader\" class=\"loader-bg\">
            <div class=\"loader-track\">
                <div class=\"loader-fill\"></div>
            </div>
        </div>
        <!-- [ Pre-loader ] End -->

        {% set user_agent = app.request.server.get('HTTP_USER_AGENT') %}
        {% if ('Microsoft Internet Explorer' in user_agent) or ('Trident' in user_agent) or ('rv:11' in user_agent)  %}
            <div style=\"background-color:#FFF3CD;color:#856404;padding:20px;text-align:center;\">
                &#x26a0; &nbsp;
                Tu navegador no es compatible con este sitio. Por favor utiliza Chrome o Firefox {{ app.request.server.get('HTTP_USER_AGENT') }}
            </div>
        {% endif %}
        {% block content %}{% endblock %}
        {% block firstInBody %}{% endblock %}

        <!-- Left side column. contains the logo and sidebar -->
        {{ render(controller(\"AppBundle:Backend/Main:mainMenu\")) }}\t

        <header class=\"navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue\">

            <div class=\"m-header\">
                <a class=\"mobile-menu\" id=\"mobile-collapse1\" href=\"#!\"><span></span></a>
                <img src=\"{{ asset('images/we_logo.png') }}\" style='max-width:80px'>
            </div>
            <a class=\"mobile-menu\" id=\"mobile-header\" href=\"#!\">
                <i class=\"feather icon-more-horizontal\"></i>
            </a>
            <div class=\"collapse navbar-collapse\">
                <ul class=\"navbar-nav mr-auto\">
                    <li><a href=\"#!\" class=\"full-screen\" onclick=\"javascript:toggleFullScreen()\"><i class=\"feather icon-maximize\"></i></a></li>
                    <li>
                        {% if app.user.userRole.id == 5 %}
                            {{ app.user.organization.name|upper }}
                        {% endif %}
                    </li>
                </ul>
                <ul class=\"navbar-nav ml-auto\">
                    <li>
                        {{ render(controller(\"AppBundle:Backend/Main:profile\")) }}
                    </li>
                </ul>
            </div>

        </header>

        <!-- Main container. Contains page content -->
        <div class=\"pcoded-main-container\">
            <div class=\"pcoded-wrapper\">
                <div class=\"pcoded-content\">
                    <div class=\"pcoded-inner-content\">
                        {% block body %}
                        {% endblock %}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.pcoded-main-container -->

        {#<footer class=\"main-footer\">
                <div class=\"pull-right hidden-xs\">
                        <b>Version</b> 1.2
                </div>
                <strong>Copyright &copy; 2017</strong> All rights reserved.
        </footer>#}




        <!-- DattaAble -->
        <script src=\"{{ asset('bundles/dattaAble/assets/js/vendor-all.min.js') }}\"></script>

        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/bootstrap/js/bootstrap.min.js') }}\"></script>

        {#<script src=\"{{ asset('bundles/dattaAble/assets/js/menu-setting.min.js') }}\"></script>#}

        <script src=\"{{ asset('bundles/dattaAble/assets/js/pcoded.js') }}\"></script>

        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/pnotify/js/pnotify.custom.min.js') }}\"></script>
        {#<script src=\"{{ asset('bundles/dattaAble/assets/plugins/pnotify/js/notify-event.js') }}\"></script>#}

        {#<script src=\"{{ asset('bundles/dattaAble/assets/plugins/vector-maps/js/jquery-jvectormap-2.0.2.min.js') }}\"></script>
        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/vector-maps/js/jquery-jvectormap-world-mill-en.js') }}\"></script>
        
        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/bootstrap-datetimepicker/bootstrap-datepicker.min.js') }}\"></script>#}

        <script src=\"{{ asset('bundles/jquery-validate/jquery.validate.min.js') }}\"></script>

        {#<script src=\"{{ asset('bundles/jquery-validate/localization/messages_es.js') }}\"></script>#}

        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/data-tables/js/datatables.min.js') }}\"></script>

        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/select2/js/select2.full.min.js') }}\"></script>

        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/ckeditor/js/ckeditor.js') }}\"></script>

        <script src=\"http://momentjs.com/downloads/moment-with-locales.min.js\"></script>

        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}\"></script>

        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/lightbox2-master/js/lightbox.min.js') }}\"></script>

        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/sweetalert/js/sweetalert.min.js') }}\"></script>

        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/inputmask/js/inputmask.min.js') }}\"></script>
        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/inputmask/js/jquery.inputmask.min.js') }}\"></script>
        <script src=\"{{ asset('bundles/dattaAble/assets/plugins/inputmask/js/autoNumeric.js') }}\"></script>
        <script src=\"https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js\"></script>
        <script type=\"text/javascript\">
                        var idioma_español = {
                            \"sProcessing\": \"Procesando...\",
                            \"sLengthMenu\": \"Mostrar _MENU_ registros\",
                            \"sZeroRecords\": \"No se encontraron resultados\",
                            \"sEmptyTable\": \"Ningún dato disponible en esta tabla\",
                            \"sInfo\": \"Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros\",
                            \"sInfoEmpty\": \"Mostrando registros del 0 al 0 de un total de 0 registros\",
                            \"sInfoFiltered\": \"(filtrado de un total de _MAX_ registros)\",
                            \"sInfoPostFix\": \"\",
                            \"sSearch\": \"Buscar:\",
                            \"sUrl\": \"\",
                            \"sInfoThousands\": \",\",
                            \"sLoadingRecords\": \"Cargando...\",
                            \"oPaginate\": {
                                \"sFirst\": \"Primero\",
                                \"sLast\": \"Último\",
                                \"sNext\": \"Siguiente\",
                                \"sPrevious\": \"Anterior\"
                            },
                            \"oAria\": {
                                \"sSortAscending\": \": Activar para ordenar la columna de manera ascendente\",
                                \"sSortDescending\": \": Activar para ordenar la columna de manera descendente\"
                            }
                        };
        </script>

        {% block extra_scripts %}

        {% endblock %}


    </body>
</html>
", "AppBundle:Backend:base.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle/Resources/views/Backend/base.html.twig");
    }
}

<?php

/* @App/Backend/associate_invoice_modal.html.twig */
class __TwigTemplate_d0301dacf0ae9db444f7e97f31403495ebe2701a4e2995e525bf2f138a4c7b16 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'extra_scripts' => array($this, 'block_extra_scripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/associate_invoice_modal.html.twig"));

        // line 1
        echo "<div id=\"associateInvoice\" class=\"modal fade\" data-show='false' tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"associateInvoiceLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog modal-lg\" role=\"document\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header theme-bg\">
\t\t\t\t<h5 class=\"modal-title text-white\" id=\"associateInvoiceLabel\">Cargar Factura</h5>
\t\t\t\t<button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"avatar-wrapper\">
\t\t\t\t\t\t<img class=\"profile-pic\" id='profile-pic' src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/frontend/bg_maderas.png"), "html", null, true);
        echo "\" />
\t\t\t\t\t\t<div class=\"upload-button\">
\t\t\t\t\t\t\t<i class=\"fa fa-arrow-circle-up\" aria-hidden=\"true\"></i>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"file\" id=\"report_invoiceImg\" name=\"report_invoiceImg\" class=\"file-upload\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/frontend/bg_maderas.png"), "html", null, true);
        echo "\" style='opacity:0'>\t\t\t\t\t\t\t
\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t</script>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6 col-6 d-flex justify-content-center\">
\t\t\t\t\t\t<button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6 col-6 d-flex justify-content-center\">
\t\t\t\t\t\t<a class=\"btn btn-rounded btn-outline-light btn-ok\" id=\"btn-ok\" name=\"btn-ok\">Aceptar</a>
\t\t\t\t\t\t<input name=\"codeId\" id=\"codeId\" type =\"hidden\"/>
\t\t\t\t\t\t<input name=\"userApp\" id=\"userApp\" type =\"hidden\" value=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()), "html", null, true);
        echo "\"/>
\t\t\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

";
        // line 36
        $this->displayBlock('extra_scripts', $context, $blocks);
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_extra_scripts($context, array $blocks = array())
    {
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "extra_scripts"));

        // line 37
        echo "<script type=\"text/javascript\">

    \$(document).ready(function() {
\t\t\$('#associateInvoice').modal();

\t\t\$('#associateInvoice').on('show.bs.modal', function(e) { 
\t\t\tdocument.getElementById('codeId').value =  \$(e.relatedTarget).data('id');
\t\t});

\t}); 
\t
\t
\tvar readURL = function(input) {
\t    \tif (input.files && input.files[0]) {
\t            var reader = new FileReader();
\t
\t            reader.onload = function (e) {
\t                \$('.profile-pic').attr('src', e.target.result);
\t            }
\t    
\t            reader.readAsDataURL(input.files[0]);
\t            \$('#avatar_notice').show();
\t        }
\t    }

\t\t\$(\".btn-ok\").on('click', function() {
\t\t\t
\t\t\tvar url = \"";
        // line 64
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_upload");
        echo "\";  
\t\t\t
\t\t\tvar file_data = \$(\"#report_invoiceImg\").prop(\"files\")[0];   
\t\t\tvar form_data = new FormData();
\t\t\tform_data.append(\"invoiceImg\", file_data);
\t\t\tform_data.append(\"codeId\", \$('#codeId').val());
\t\t\tform_data.append(\"idUser\", \$('#userApp').val());
\t\t\t
\t\t\t\$.ajax({   
\t\t\t\turl :  url,
\t\t\t\tdata : form_data,
\t\t\t\tcache: false,
\t\t\t\tcontentType: false,
\t\t\t\tprocessData: false,
\t\t\t\ttype : 'POST',\t  
\t\t\t\tdataType: 'script',  
\t\t\t\tsuccess : function(json) {
\t\t\t\t\tconsole.log(json);
\t\t\t\t\twindow.location = '";
        // line 82
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("backend_report_campaings");
        echo "'
\t\t\t\t},
\t\t\t\terror : function(xhr, status) {
\t\t\t\t\talert('Disculpe, se presentó un problema al validar los datos');
\t\t\t\t}
\t\t\t});
\t\t});
\t   
\t    \$(\".file-upload\").on('change', function(){
\t        readURL(this);
\t    });
\t    
\t    \$(\".upload-button\").on('click', function() {
\t       \$(\".file-upload\").click();
\t    });
\t\t
</script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/associate_invoice_modal.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 82,  110 => 64,  81 => 37,  69 => 36,  58 => 28,  42 => 15,  35 => 11,  23 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div id=\"associateInvoice\" class=\"modal fade\" data-show='false' tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"associateInvoiceLabel\" aria-hidden=\"true\">
\t<div class=\"modal-dialog modal-lg\" role=\"document\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header theme-bg\">
\t\t\t\t<h5 class=\"modal-title text-white\" id=\"associateInvoiceLabel\">Cargar Factura</h5>
\t\t\t\t<button type=\"button\" class=\"close text-white\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"avatar-wrapper\">
\t\t\t\t\t\t<img class=\"profile-pic\" id='profile-pic' src=\"{{ asset('images/frontend/bg_maderas.png') }}\" />
\t\t\t\t\t\t<div class=\"upload-button\">
\t\t\t\t\t\t\t<i class=\"fa fa-arrow-circle-up\" aria-hidden=\"true\"></i>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"file\" id=\"report_invoiceImg\" name=\"report_invoiceImg\" class=\"file-upload\" src=\"{{ asset('images/frontend/bg_maderas.png') }}\" style='opacity:0'>\t\t\t\t\t\t\t
\t\t\t\t\t\t<script>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t</script>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-6 col-6 d-flex justify-content-center\">
\t\t\t\t\t\t<button type=\"reset\" data-dismiss=\"modal\" class=\"btn btn-rounded btn-danger\">Cancelar</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6 col-6 d-flex justify-content-center\">
\t\t\t\t\t\t<a class=\"btn btn-rounded btn-outline-light btn-ok\" id=\"btn-ok\" name=\"btn-ok\">Aceptar</a>
\t\t\t\t\t\t<input name=\"codeId\" id=\"codeId\" type =\"hidden\"/>
\t\t\t\t\t\t<input name=\"userApp\" id=\"userApp\" type =\"hidden\" value=\"{{ app.user.id }}\"/>
\t\t\t\t\t</div>\t
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>

{% block extra_scripts %}
<script type=\"text/javascript\">

    \$(document).ready(function() {
\t\t\$('#associateInvoice').modal();

\t\t\$('#associateInvoice').on('show.bs.modal', function(e) { 
\t\t\tdocument.getElementById('codeId').value =  \$(e.relatedTarget).data('id');
\t\t});

\t}); 
\t
\t
\tvar readURL = function(input) {
\t    \tif (input.files && input.files[0]) {
\t            var reader = new FileReader();
\t
\t            reader.onload = function (e) {
\t                \$('.profile-pic').attr('src', e.target.result);
\t            }
\t    
\t            reader.readAsDataURL(input.files[0]);
\t            \$('#avatar_notice').show();
\t        }
\t    }

\t\t\$(\".btn-ok\").on('click', function() {
\t\t\t
\t\t\tvar url = \"{{ path('backend_upload') }}\";  
\t\t\t
\t\t\tvar file_data = \$(\"#report_invoiceImg\").prop(\"files\")[0];   
\t\t\tvar form_data = new FormData();
\t\t\tform_data.append(\"invoiceImg\", file_data);
\t\t\tform_data.append(\"codeId\", \$('#codeId').val());
\t\t\tform_data.append(\"idUser\", \$('#userApp').val());
\t\t\t
\t\t\t\$.ajax({   
\t\t\t\turl :  url,
\t\t\t\tdata : form_data,
\t\t\t\tcache: false,
\t\t\t\tcontentType: false,
\t\t\t\tprocessData: false,
\t\t\t\ttype : 'POST',\t  
\t\t\t\tdataType: 'script',  
\t\t\t\tsuccess : function(json) {
\t\t\t\t\tconsole.log(json);
\t\t\t\t\twindow.location = '{{ path('backend_report_campaings') }}'
\t\t\t\t},
\t\t\t\terror : function(xhr, status) {
\t\t\t\t\talert('Disculpe, se presentó un problema al validar los datos');
\t\t\t\t}
\t\t\t});
\t\t});
\t   
\t    \$(\".file-upload\").on('change', function(){
\t        readURL(this);
\t    });
\t    
\t    \$(\".upload-button\").on('click', function() {
\t       \$(\".file-upload\").click();
\t    });
\t\t
</script>
{% endblock %}", "@App/Backend/associate_invoice_modal.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\associate_invoice_modal.html.twig");
    }
}

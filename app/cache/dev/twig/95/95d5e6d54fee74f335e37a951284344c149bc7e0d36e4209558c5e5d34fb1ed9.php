<?php

/* @App/Backend/main_menu.html.twig */
class __TwigTemplate_e9179bb15021c233e0626618f9c5b0cd46f4c3d6110642b1b31b798b2197d0f7 extends Twig_Template
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
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@App/Backend/main_menu.html.twig"));

        // line 1
        echo "<nav class=\"pcoded-navbar\">
    <div class=\"navbar-wrapper\">
        <div class=\"navbar-brand\">
            <img class=\"\" src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("images/prlm_logo.png"), "html", null, true);
        echo "\" style='max-width:78px;padding:10px;'>\t\t\t
            <a class=\"mobile-menu\" id=\"mobile-collapse\" href=\"#!\"><span></span></a>
        </div>
        <div class=\"navbar-content scroll-div\">
            <ul class=\"nav pcoded-inner-navbar\">
                <li class=\"nav-item pcoded-menu-caption\">
                    <label>Menu</label>
                </li>
                ";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["userModules"]) ? $context["userModules"] : $this->getContext($context, "userModules")));
        foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
            echo "\t\t\t\t\t\t\t
                    ";
            // line 13
            if (($this->getAttribute($context["module"], "parent_id", array()) == 0)) {
                echo " 
                        <li id=\"";
                // line 14
                echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "mcid", array()), "html", null, true);
                echo "\" data-username=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "module_name", array()), "html", null, true);
                echo "\" class=\"nav-item ";
                echo ((($this->getAttribute($context["module"], "count_children", array()) > 0)) ? ("pcoded-hasmenu ") : (""));
                echo ((((isset($context["menuId"]) ? $context["menuId"] : $this->getContext($context, "menuId")) == $this->getAttribute($context["module"], "mcid", array()))) ? ("active") : (""));
                echo "\">
                            <a href=\"";
                // line 15
                echo ((($this->getAttribute($context["module"], "count_children", array()) > 0)) ? ("javascript:") : ($this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute($context["module"], "url_access", array()))));
                echo "\" class=\"nav-link\"> 
                                <span class=\"pcoded-micon\">
                                    <i class=\"fa ";
                // line 17
                echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "module_icon", array()), "html", null, true);
                echo "\"></i> 
                                </span>
                                <span class=\"pcoded-mtext\">";
                // line 19
                echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "module_name", array()), "html", null, true);
                echo "</span>
                            </a>
                            ";
                // line 21
                if (($this->getAttribute($context["module"], "count_children", array()) > 0)) {
                    echo " 
                                <ul class=\"pcoded-submenu\">
                                    ";
                    // line 23
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["module"], "children", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["subModule"]) {
                        // line 24
                        echo "                                        <li class=\"";
                        echo ((((isset($context["menuId"]) ? $context["menuId"] : $this->getContext($context, "menuId")) == $this->getAttribute($context["subModule"], "mcid", array()))) ? ("active") : (""));
                        echo "\">
                                            <a class=\"\" href=\"";
                        // line 25
                        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath($this->getAttribute($context["subModule"], "url_access", array()));
                        echo "\"> 
                                                <span class=\"pcoded-micon\">
                                                    <i class=\"fa ";
                        // line 27
                        echo twig_escape_filter($this->env, $this->getAttribute($context["subModule"], "module_icon", array()), "html", null, true);
                        echo "\"></i> 
                                                </span>
                                                <span class=\"\">";
                        // line 29
                        echo twig_escape_filter($this->env, $this->getAttribute($context["subModule"], "module_name", array()), "html", null, true);
                        echo "</span>
                                            </a>
                                        </li>
                                        <script>
                                            var menuId = ";
                        // line 33
                        echo twig_escape_filter($this->env, (isset($context["menuId"]) ? $context["menuId"] : $this->getContext($context, "menuId")), "html", null, true);
                        echo ";
                                            var subModuleId = ";
                        // line 34
                        echo twig_escape_filter($this->env, $this->getAttribute($context["subModule"], "mcid", array()), "html", null, true);
                        echo ";
                                            var parentId =";
                        // line 35
                        echo twig_escape_filter($this->env, $this->getAttribute($context["subModule"], "parent_id", array()), "html", null, true);
                        echo "

                                                    if (menuId == subModuleId){
                                            \$(\"#\" + parentId).addClass(\"active\");
                                            \$(\"#\" + parentId).addClass(\"pcoded-trigger\");
                                            }
                                        </script>
                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subModule'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 42
                    echo " 
                                </ul> 
                            ";
                }
                // line 45
                echo "                        </li>\t
                    ";
            }
            // line 46
            echo "\t\t\t\t
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "            </ul>
        </div>
    </div>
</nav>";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "@App/Backend/main_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 48,  134 => 46,  130 => 45,  125 => 42,  111 => 35,  107 => 34,  103 => 33,  96 => 29,  91 => 27,  86 => 25,  81 => 24,  77 => 23,  72 => 21,  67 => 19,  62 => 17,  57 => 15,  48 => 14,  44 => 13,  38 => 12,  27 => 4,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<nav class=\"pcoded-navbar\">
    <div class=\"navbar-wrapper\">
        <div class=\"navbar-brand\">
            <img class=\"\" src=\"{{ asset('images/prlm_logo.png') }}\" style='max-width:78px;padding:10px;'>\t\t\t
            <a class=\"mobile-menu\" id=\"mobile-collapse\" href=\"#!\"><span></span></a>
        </div>
        <div class=\"navbar-content scroll-div\">
            <ul class=\"nav pcoded-inner-navbar\">
                <li class=\"nav-item pcoded-menu-caption\">
                    <label>Menu</label>
                </li>
                {% for module in userModules  %}\t\t\t\t\t\t\t
                    {% if module.parent_id == 0 %} 
                        <li id=\"{{ module.mcid }}\" data-username=\"{{ module.module_name }}\" class=\"nav-item {{ module.count_children > 0 ? 'pcoded-hasmenu ' : ''}}{{ menuId == module.mcid ? 'active' : '' }}\">
                            <a href=\"{{ module.count_children > 0 ? 'javascript:' : path(module.url_access) }}\" class=\"nav-link\"> 
                                <span class=\"pcoded-micon\">
                                    <i class=\"fa {{ module.module_icon }}\"></i> 
                                </span>
                                <span class=\"pcoded-mtext\">{{ module.module_name }}</span>
                            </a>
                            {% if module.count_children > 0 %} 
                                <ul class=\"pcoded-submenu\">
                                    {% for subModule in module.children %}
                                        <li class=\"{{ menuId == subModule.mcid ? 'active' : '' }}\">
                                            <a class=\"\" href=\"{{ path(subModule.url_access) }}\"> 
                                                <span class=\"pcoded-micon\">
                                                    <i class=\"fa {{ subModule.module_icon }}\"></i> 
                                                </span>
                                                <span class=\"\">{{ subModule.module_name }}</span>
                                            </a>
                                        </li>
                                        <script>
                                            var menuId = {{ menuId }};
                                            var subModuleId = {{ subModule.mcid }};
                                            var parentId ={{ subModule.parent_id }}

                                                    if (menuId == subModuleId){
                                            \$(\"#\" + parentId).addClass(\"active\");
                                            \$(\"#\" + parentId).addClass(\"pcoded-trigger\");
                                            }
                                        </script>
                                    {% endfor %} 
                                </ul> 
                            {% endif %}
                        </li>\t
                    {% endif %}\t\t\t\t
                {% endfor %}
            </ul>
        </div>
    </div>
</nav>", "@App/Backend/main_menu.html.twig", "C:\\xampp\\htdocs\\prlm_backend\\src\\AppBundle\\Resources\\views\\Backend\\main_menu.html.twig");
    }
}

#Datepickersingle
Datepickersingle plugin was based on datepicker by Smarty but
the difference between both datepicker and datepickersingle
are with the datepickersingle you can make datepicker with both
multiple fields and calling the function just one time also you 
can change the skin using $template.

#Dependencies
Smarty (http://www.smarty.net/) >= 3.0.0

#How to use
whatever.tpl

    <div>
        <input type="text" id="field1" />
        <input type="text" id="field2" />
        <input type="text" id="field3" />
        {datepickerone fields="field1,field2,field3" pathSkinImages=""}
    </div>

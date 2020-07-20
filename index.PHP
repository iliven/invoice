<!DOCTYPE html>
<html>
<head>
  <title>iLIVEN</title>
  <meta charset='utf-8'>
  <meta name="description" content="Invoices and Invoicing Application">
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.4/angular.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
</head>
<body ng-app="invoicing" ng-controller="InvoiceCtrl" >
  <div class="container" id="invoice" >
   
  
    <div class="row"><!------------------------------------>
      <div class="col-xs-12 heading">
        INVOICE
      </div>
    </div><!---------------end--------------------->



    <div class="row branding">
      <!---- invoice---->
      <div class="col-xs-7">
        <div class="invoice-number-container">
          <label for="invoice-number">Invoice NO#</label><input type="text" id="invoice-number" ng-model="invoice.invoice_number" />
        </div>
      </div>
      <!---- invoice end---->
      <!---- logo---->
      <div class="col-xs-4 logo-container">
        <input type="file" id="imgInp" />
        <img ng-hide="logoRemoved" id="company_logo" ng-src="{{ logo }}" alt="your image" width="300" />
        <div> 
        </div>
      </div>
      <!---- logo end---->
    </div>
    <div class="row infos">
      <div class="col-xs-6">
       <label>Name</label> 
       <div class="input-container"><input type="text" ng-model="invoice.customer_info.name"/></div>
       <label>phone</label>
        <div class="input-container"><input type="text" ng-model="invoice.customer_info.phone"/></div>
        <label>Address</label><br>
        <textarea id="w3review" name="w3review" rows="4" cols="50" ng-model="invoice.customer_info.address1"></textarea>
        
        <div class="input-container" data-ng-hide='printMode'>
          <select ng-model='currencySymbol' ng-options='currency.symbol as currency.name for currency in availableCurrencies'></select>
        </div>
      </div>
      <div class="col-xs-6 right">
        <label>iLIVEN</label><br>
        <label>01614444001</label><br>
        <label>LANE-07(west), House-407/4(2nd floor), Baridhara DOHS</label><br>
        <label>ilivenbd.com</label><br>
      </div>
    </div>
    <div class="items-table">
      <div class="row header">
        <div class="col-xs-1">&nbsp;</div>
        <div class="col-xs-5">Description</div>
        <div class="col-xs-2">Quantity</div>
        <div class="col-xs-2">Cost {{currencySymbol}}</div>
        <div class="col-xs-2 text-right">Total</div>
      </div>
      <div class="row invoice-item" ng-repeat="item in invoice.items" ng-animate="'slide-down'">
        <div class="col-xs-1 remove-item-container">
          <a href ng-hide="printMode" ng-click="removeItem(item)" class="btn btn-danger">[X]</a>
        </div>
        <div class="col-xs-5 input-container">
          <input ng-model="item.description" placeholder="Description" />
        </div>
        <div class="col-xs-2 input-container">
          <input ng-model="item.qty" value="1" size="4" ng-required ng-validate="integer" placeholder="Quantity" />
        </div>
        <div class="col-xs-2 input-container">
          <input ng-model="item.cost" value="0.00" ng-required ng-validate="number" size="6" placeholder="Cost" />
        </div>
        <div class="col-xs-2 text-right input-container">
          {{item.cost * item.qty | currency: currencySymbol}}
        </div>
      </div>
      <div class="row invoice-item">
        <div class="col-xs-12 add-item-container" ng-hide="printMode">
          <a class="btn btn-primary" href ng-click="addItem()" >[+]</a>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-10 text-right">Sub Total</div>
        <div class="col-xs-2 text-right">{{invoiceSubTotal() | currency: currencySymbol}}</div>
      </div>
      <div class="row">
        <div class="col-xs-9 text-right">With Delivery Charge</div>
        <input ng-model="invoice.tax" placeholder="0" />
      </div>
      <div class="row">
        <div class="col-xs-9 text-right">With Delivery Charge</div>
        <input ng-model="Intotal" placeholder="0" />
      </div>
    
    
    </div>
    <div class="row noPrint actions">
      <a href="#" class="btn btn-primary" ng-show="printMode" ng-click="printInfo()">Print</a>
      <a href="#" class="btn btn-primary" ng-click="clearLocalStorage()">Reset</a>
      <a href="#" class="btn btn-primary" ng-hide="printMode" ng-click="printMode = true;">Turn On Print Mode</a>
      <a href="#" class="btn btn-primary" ng-show="printMode" ng-click="printMode = false;">Turn Off Print Mode</a>
    </div>
  </div>

  <div ng-hide="printMode" class="copy noPrint">
    <a href="https://facebook.com/ilivenbd/">iLIVEN</a>
     &amp;
    
    Made with
    <span class="love">&#9829;</span> by
    <a href="#">Hunter Zoolemon</a>
  </div>
</body>
</html>

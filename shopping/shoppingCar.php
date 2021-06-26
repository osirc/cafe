<div class="container-fluid">
    <div class="card shopping-cart">
        <div class="card-header bg-dark text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            Shipping cart
            <a href="" class="btn btn-outline-info btn-sm pull-right">Continiu shopping</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <!-- PRODUCT -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src=images/starbucks.png alt="prewiew" style="max-width: 25% !important;">
                </div>
                <div class="col-12 text-sm-center text-md-left col-md-6">
                    <figcaption class="media-body">
                        <h6 class="title text-truncate">Product name goes here </h6>
                        <dl class="param param-inline small">
                            <dt>Size: </dt>
                            <dd>XXL</dd>
                        </dl>
                        <dl class="param param-inline small">
                            <dt>Color: </dt>
                            <dd>Orange color</dd>
                        </dl>
                    </figcaption>
                </div>

                <div class="col-2 col-sm-2 col-md-1 text-sm-center row">
                    <select class="form-control">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                    </select>
                </div>

                <div class="col-12 col-sm-12 text-sm-center col-md-3 text-md-right row">
                    <div class="col-4  col-md-6">
                        <div class="price-wrap">
                            <var class="price">USD 145</var>
                            <small class="text-muted">(USD5 each)</small>
                        </div>
                    </div>
                    <div class="col-3 col-sm-3 col-md-5 text-sm-center">
                        <button type="button" class="btn btn-outline-danger btn-xs">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <!-- END PRODUCT -->
            <div class="pull-right">
                <a href="" class="btn btn-outline-secondary pull-right">
                    Update shopping cart
                </a>
            </div>
        </div>


        <div class="card-footer">
            <div class="coupon col-md-5 col-sm-5 no-padding-left pull-left">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control" placeholder="cupone code">
                    </div>
                    <div class="col-6">
                        <input type="submit" class="btn btn-default" value="Use cupone">
                    </div>
                </div>
            </div>
            <div class="pull-right" style="margin: 10px">
                <a href="" class="btn btn-success pull-right">Checkout</a>
                <div class="pull-right" style="margin: 5px">
                    Total price: <b>50.00€</b>
                </div>
            </div>
        </div>

    </div> <!-- /#shopping-cart -->
</div>
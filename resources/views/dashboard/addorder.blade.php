@extends('dashboard.index')
@section('page_name')
Admin Add Order For User
@endsection
@section('ordercontent')
    <div class="container mt-4">
        <div class="row">
            <!-- Order Summary Card -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0"><i class="fas fa-shopping-cart me-2"></i>Order Summary</h5>
                    </div>
                    <div class="card-body">
                        <!-- Order Items -->
                        <div class="row mb-3">
                            <div class="col-6">
                                <label class="form-label fw-bold">Tea</label>
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                    <input type="number" class="form-control text-center" id="tea-qty" value="5" min="0">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                </div>
                                <small class="text-muted">EGP 25 each</small>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Cola</label>
                                <div class="input-group">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">-</button>
                                    <input type="number" class="form-control text-center" id="cola-qty" value="3" min="0">
                                    <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                </div>
                                <small class="text-muted">EGP 30 each</small>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Notes</label>
                            <textarea class="form-control" rows="3"
                                placeholder="1 Tea Extra Sugar">1 Tea Extra Sugar</textarea>
                        </div>

                        <!-- Room Selection -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Room</label>
                            <select class="form-select">
                                <option selected>ComboBox</option>
                                <option>Meeting Room A</option>
                                <option>Meeting Room B</option>
                                <option>Office 101</option>
                            </select>
                        </div>

                        <!-- Add to User -->
                        <div class="mb-3">
                            <label class="form-label fw-bold">Add to user</label>
                            <select class="form-select">
                                <option selected>Islam Askar</option>
                                <option>John Doe</option>
                                <option>Jane Smith</option>
                                <option>Ahmed Ali</option>
                            </select>
                        </div>

                        <!-- Total -->
                        <div class="text-center p-3 rounded total-price mb-3">
                            <span id="total-price">EGP 55</span>
                        </div>

                        <!-- Confirm Button -->
                        <button class="btn btn-primary w-100 btn-lg">
                            <i class="fas fa-check me-2"></i>Confirm Order
                        </button>
                    </div>
                </div>
            </div>

            <!-- Drinks Menu -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Menu Selection</h5>
                            </div>
                            <div class="col-auto">
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    <input type="text" class="form-control" placeholder="Search drinks...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <!-- Row 1 -->
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'tea', 5)">
                                    <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Tea</h6>
                                    <span class="badge price-badge">5 LE</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'tea', 6)">
                                    <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Tea</h6>
                                    <span class="badge price-badge">6 LE</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'tea', 8)">
                                    <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Tea</h6>
                                    <span class="badge price-badge">8 LE</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'tea', 10)">
                                    <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Tea</h6>
                                    <span class="badge price-badge">10 LE</span>
                                </div>
                            </div>

                            <!-- Row 2 -->
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'tea', 5)">
                                    <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Tea</h6>
                                    <span class="badge price-badge">5 LE</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'coffee', 8)">
                                    <i class="fas fa-coffee fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Coffee</h6>
                                    <span class="badge price-badge">8 LE</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'nescafe', 10)">
                                    <i class="fas fa-coffee fa-3x mb-2" style="color: var(--medium-brown);"></i>
                                    <h6 class="fw-bold">Nescafe</h6>
                                    <span class="badge price-badge">10 LE</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'cola', 12)">
                                    <i class="fas fa-glass-whiskey fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Cola</h6>
                                    <span class="badge price-badge">12 LE</span>
                                </div>
                            </div>

                            <!-- Row 3 -->
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'tea', 5)">
                                    <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Tea</h6>
                                    <span class="badge price-badge">5 LE</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'tea', 6)">
                                    <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Tea</h6>
                                    <span class="badge price-badge">6 LE</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'tea', 7)">
                                    <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Tea</h6>
                                    <span class="badge price-badge">7 LE</span>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="drink-item p-3 text-center h-100" onclick="selectDrink(this, 'tea', 8)">
                                    <i class="fas fa-mug-hot fa-3x mb-2" style="color: var(--coffee-brown);"></i>
                                    <h6 class="fw-bold">Tea</h6>
                                    <span class="badge price-badge">8 LE</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
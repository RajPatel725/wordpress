<?php
// Template Name: Ajax Form
get_header();
?>


<div class="container">
    
    <form action="" method="POST" id="email_form" enctype="multipart/form-data">

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" class="form-control" id="email">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
            </div>
        </div>
            
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="cars">Choose a car:</label>
                    <select name="cars" id="cars"  class="form-control">
                        <option value="" default>Pleace select</option>
                        <option value="volvo">Volvo</option>
                        <option value="i20">I 20</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input type="checkbox" id="vehicle1" name="vehicle[]" value="Bike">
                    <label for="vehicle1"> I have a bike</label>
                    <input type="checkbox" id="vehicle2" name="vehicle[]" value="Car">
                    <label for="vehicle2"> I have a car</label>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <input type="radio" id="html" name="fav_language" value="HTML">
                    <label for="html">HTML</label>
                    <input type="radio" id="javascript" name="fav_language" value="JavaScript">
                    <label for="javascript">JavaScript</label>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="birthday">Birthday:</label>
                    <input type="date" id="birthday" name="birthday">
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Choose File:
                        <input type="file" name="image" id="image" />
                    </label>
                    <label for="featuredImage">Featured Image:
                        <input type="file" name="featuredImage" id="featuredImage" />
                    </label>
                </div>
            </div>
        </div>  

        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <label for="message">Please enter you message:</label>
                    <textarea id="message" name="message" rows="2" cols="15"></textarea>
                </div>
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    
    </form>
</div>

<div id="data"></div>

<?php
get_footer();
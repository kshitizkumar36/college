<?php
include 'header.php';
?>

<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
            
                  


<div class="row">
  <!-- FormValidation -->
  <div class="col-12">
    <div class="card">
      <h5 class="card-header">Create New Blog</h5>
      <div class="card-body">

        <form id="formValidationExamples" class="row g-6" action="php_code/backend.php" method="post" enctype="multipart/form-data">

          <!-- Account Details -->

          <div class="col-12">
            <h6 class="text-muted">1. Heading Details</h6>
            <hr class="mt-0" />
          </div>


          <div class="col-md-4">
            <label class="form-label" for="formValidationName">Choose Blog Category</label>
           	<select class="form-control" name="blog_menu">
           		<option>Please Select</option>
           		<?php
           		$query_menu= "SELECT * FROM `menu` WHERE `status`='1'";
           		$run_menu= mysqli_query($connect,$query_menu);
           		while($data_menu= mysqli_fetch_assoc($run_menu))
           		{
           			?>
           			<option value="<?php echo $data_menu['id']; ?>"><?php echo $data_menu['menu']; ?></option>
           			<?php
           		}

           		?>
           	</select>
          </div>
          <div class="col-md-4">
            <label class="form-label" for="">Title</label>
           <textarea class="form-control" name="title"></textarea>
          </div>


          <div class="col-md-4">
            <label class="form-label" for="">Sub Title</label>
            <textarea class="form-control" name="subtitle"></textarea>
          </div>

         
      


          <!-- Personal Info -->

          <div class="col-12">
            <h6 class="mt-2 text-muted">2. Upload Main Image for the Blog</h6>
            <hr class="mt-0" />
          </div>

          <div class="col-md-6">
            <label for="formValidationFile" class="form-label">Image</label>
            <input class="form-control" type="file" id="main_img" name="main_img">
          </div>
         

         
         


          <!-- Choose Your Plan -->

          <div class="col-12">
            <h6 class="mt-2 text-muted">3. Write Blog Part 1</h6>
            <hr class="mt-0" />
          </div>
          <div class="row gy-3 mt-0">
            
            	 <div class="col-md-12">
		            <label class="form-label" for="">Blog Part 1</label>
		            <textarea class="form-control" name="blog_part_1" id="blog1"></textarea>
		          </div>
          </div>





             <div class="col-12">
            <h6 class="mt-2 text-muted">4. Write Blog Part 2</h6>
            <hr class="mt-0" />
          </div>
          <div class="row gy-3 mt-0">
            
            	 <div class="col-md-12">
		            <label class="form-label" for="">Blog Part 2</label>
		            <textarea class="form-control" name="blog_part_2" id="blog2"></textarea>
		          </div>
          </div>




   <div class="col-12">
            <h6 class="mt-2 text-muted">5. Write Blog Part 3</h6>
            <hr class="mt-0" />
          </div>
          <div class="row gy-3 mt-0">
            
            	 <div class="col-md-12">
		            <label class="form-label" for="">Blog Part 3</label>
		            <textarea class="form-control" name="blog_part_3" id="blog3"></textarea>
		          </div>
          </div>





          <div class="col-12">
            <h6 class="mt-2 text-muted">6. Upload Remaining Photos for the Blog</h6>
            <hr class="mt-0" />
          </div>

          <div class="col-md-6">
            <label for="formValidationFile" class="form-label">Image 1</label>
            <input class="form-control" type="file" id="img1" name="img1">
          </div>
         



           <div class="col-md-6">
            <label for="formValidationFile" class="form-label">Image 2</label>
            <input class="form-control" type="file" id="img_2" name="img_2">
          </div>
         


           <div class="col-md-6">
            <label for="formValidationFile" class="form-label">Image 3</label>
            <input class="form-control" type="file" id="img_3" name="img_3">
          </div>
          




             <div class="col-12">
            <h6 class="mt-2 text-muted">7. Write Blog Part 4</h6>
            <hr class="mt-0" />
          </div>
          <div class="row gy-3 mt-0">
            
            	 <div class="col-md-12">
		            <label class="form-label" for="">Blog Part 4</label>
		            <textarea class="form-control" name="blog4" id="blog4"></textarea>
		          </div>
          </div>


           <div class="row gy-3 mt-0">
            
               <div class="col-md-12">
                <label class="form-label" for="">Youtube Link (copy the youtube link as shown in placeholder)</label>
                <textarea class="form-control" name="youtube" id="youtube" placeholder="https://www.youtube.com/watch?--->(v=k7HfZf-OGuk)<---- &list=RDMMk7HfZf-OGuk&start_radio=1">  </textarea>
              </div>
          </div>

          <input type="hidden" value="<?php echo $user_id; ?>" name="user_id">
         <div class="row mt-3">
          <div class="col-12">
            <button type="submit" name="submitBog" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /FormValidation -->

                                   <!-- end of forms -->
                                </div>

                               
                    <!--  -->
                
</div>

<?php
include 'footer.php';
?>



<script>
            ClassicEditor
                .create(document.querySelector('#blog1'))
                .catch(error => {
                    console.error(error);
                });


                  ClassicEditor
                .create(document.querySelector('#blog2'))
                .catch(error => {
                    console.error(error);
                });



                  ClassicEditor
                .create(document.querySelector('#blog3'))
                .catch(error => {
                    console.error(error);
                });


                  ClassicEditor
                .create(document.querySelector('#blog4'))
                .catch(error => {
                    console.error(error);
                });
</script>
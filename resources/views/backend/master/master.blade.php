<!DOCTYPE html>
<html>

@include("backend/master/layouts/head")
<body>
	<!-- header -->
	@include("backend/master/layouts/header")
	<!-- header -->
	<!-- sidebar left-->
	@include("backend/master/layouts/sidebar")
	<!--/. end sidebar left-->

	@yield("main");

</body>

</html>
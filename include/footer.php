<footer class="footer py-3">
      <div class="container d-flex justify-content-between">
        <p class="fs-6 m-0 text-muted">&copy; <?php echo date('Y') ?> Artistique</p>
        <div class="d-flex">
          <p class="fs-6 m-0 text-muted">
            Built with <i class="bi bi-suit-heart px-1"></i>
            by Chun Fai, Yee Hang, Jun Xian & Khai Gene
          </p>
        </div>
        <div>
          <a href="https://www.twitter.com" class="mx-2 text-muted text-decoration-none" target="_blank">
            <i class="bi bi-twitter"></i>
          </a>
          <a href="https://www.facebook.com" class="mx-2 text-muted text-decoration-none" target="_blank">
            <i class="bi bi-facebook"></i>
          </a>
          <a href="https://www.instagram.com" class="mx-2 text-muted text-decoration-none" target="_blank">
            <i class="bi bi-instagram"></i>
          </a>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable();
        });
    </script>

  </body>
</html>

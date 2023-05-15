using System.ComponentModel.DataAnnotations.Schema;

namespace net7.Models;

public class Products
{
    public int Id { get; set; }
    public string Title { get; set; }
    public string Image { get; set; }
    public int Price { get; set; }

    [Column("category_id")]
    public int CategoryId { get; set; }
    public Categories? Category { get; set; }

    [Column("created_at")]
    public DateTime? CreatedAt { get; set; }
    [Column("updated_at")]
    public DateTime? UpdatedAt { get; set; }
    [Column("is_delete")]
    public bool IsDelete { get; set; }
}

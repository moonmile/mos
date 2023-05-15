using System.ComponentModel.DataAnnotations.Schema;

namespace net7.Models;

public partial class Categories
{
    public int Id { get; set; }
    public string Category { get; set; }
    public string Title { get; set; }
    public string Image { get; set; }

    [Column("created_at")]
    public DateTime? CreatedAt { get; set; }
    [Column("updated_at")]
    public DateTime? UpdatedAt { get; set;}
    [Column("is_delete")]
    public bool IsDelete { get; set;}
}
